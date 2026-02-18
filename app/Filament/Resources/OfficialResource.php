<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfficialResource\Pages;
use App\Models\Official;
use App\Models\Satker; // Import Model Satker
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get; // 👈 JANGAN LUPA IMPORT INI
use Filament\Forms\Set;
use Illuminate\Support\Collection;

class OfficialResource extends Resource
{
    protected static ?string $model = Official::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Pejabat & Struktur';
    protected static ?string $navigationGroup = 'Profil & Organisasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Personil')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('rank')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('position')
                            ->label('Jabatan')
                            ->required()
                            ->maxLength(255),

                        // 1. UNIT KERJA (Pemicu Filter)
                        Forms\Components\Select::make('unit')
                            ->label('Satuan Unit (Opsional)')
                            ->options([
                                'Subdit Binpolmas' => 'Subdit Binpolmas',
                                'Subdit Bintibsos' => 'Subdit Bintibsos',
                                'Subdit Bhabinkamtibmas' => 'Subdit Bhabinkamtibmas',
                                'Subdit Satpam/Pola' => 'Subdit Satpam/Pola',
                                'Subbag Renmin' => 'Subbag Renmin',
                                'Bag Binopsnal' => 'Bag Binopsnal',
                            ])
                            ->placeholder('Pilih Unit jika pejabat ini milik Satfungsi tertentu')
                            ->searchable()
                            ->live() // 👈 PENTING: Agar saat diganti, field lain ikut update
                            ->afterStateUpdated(fn(Set $set) => $set('parent_id', null)), // Reset atasan jika unit ganti

                        // 2. LOGIKA PARENT-CHILD (TERFILTER)
                        Forms\Components\Select::make('parent_id')
                            ->label('Atasan Langsung')
                            ->options(function (Get $get) {
                                $currentUnit = $get('unit'); // Ambil nilai Unit yang dipilih

                                if (! $currentUnit) {
                                    return []; // Kalau belum pilih unit, kosongkan list atasan
                                }

                                // Hanya ambil pejabat DARI UNIT YANG SAMA
                                return \App\Models\Official::where('unit', $currentUnit)
                                    ->pluck('name', 'id');
                            })
                            ->searchable()
                            ->preload()
                            ->helperText('Hanya menampilkan pejabat di unit yang sama. Kosongkan jika ini Pimpinan Tertinggi.'),

                        Forms\Components\TextInput::make('name')
                            ->label('Nama Lengkap & Gelar')
                            ->required(),

                        Forms\Components\TextInput::make('rank')
                            ->label('Pangkat')
                            ->placeholder('Contoh: KOMBES POL, AKBP'),

                        Forms\Components\TextInput::make('position')
                            ->label('Jabatan')
                            ->required()
                            ->placeholder('Contoh: KASUBDIT, KANIT, BANUM'),

                        Forms\Components\FileUpload::make('image')
                            ->label('Foto Profil')
                            ->directory('officials')
                            ->avatar()
                            ->imageEditor()
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups(['unit']) // Grouping di tabel agar rapi per Subdit
            ->defaultGroup('unit')
            ->columns([
                Tables\Columns\ImageColumn::make('image')->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('position')
                    ->label('Jabatan')
                    ->description(fn($record) => $record->rank), // Tampilkan pangkat di bawah jabatan

                // Tampilkan nama atasan agar admin tahu struktur
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Bawahan Dari')
                    ->icon('heroicon-m-arrow-turn-up-right')
                    ->color('gray')
                    ->placeholder('Pimpinan Tertinggi'),
            ])
            ->defaultSort('created_at', 'asc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOfficials::route('/'),
            'create' => Pages\CreateOfficial::route('/create'),
            'edit' => Pages\EditOfficial::route('/{record}/edit'),
        ];
    }
}
