<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SatkerResource\Pages;
use App\Models\Satker;
use Filament\Forms;
use Filament\Forms\Form; // 👈 INI YANG TADI HILANG/ERROR
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str; // Import untuk bikin slug otomatis
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid; // Tambahan untuk layout

class SatkerResource extends Resource
{
    protected static ?string $model = Satker::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Profil Satuan Kerja';

    protected static ?string $navigationGroup = 'Profil & Organisasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // TAB 1: INFO UTAMA
                Section::make('Identitas Satuan')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Satuan')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn(string $operation, $state, \Filament\Forms\Set $set) =>
                                $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null
                            ),
                        TextInput::make('slug')->required()->readOnly(),

                        // KONTAK & LOKASI (BARU)
                        Grid::make(2)->schema([
                            TextInput::make('phone')->label('Nomor Telepon')->tel(),
                            Textarea::make('location')->label('Alamat Lokasi')->rows(1),
                        ]),

                        Textarea::make('deskripsi')->required()->columnSpanFull(),
                        RichEditor::make('tugas_pokok')->label('Tugas Pokok')->required()->columnSpanFull(),
                    ])->columns(2),

                // TAB 2: DATA MENDETAIL
                Section::make('Detail Informasi')
                    ->schema([
                        // 1. HAPUS FileUpload::make('structure_image') karena kita pakai codingan

                        // 2. FORM FUNGSI (Tetap)
                        Repeater::make('fungsi')
                            ->label('Daftar Fungsi')
                            ->simple(TextInput::make('item')->required())
                            ->columnSpanFull(),

                        // 3. UPDATE AGENDA (Tambah Galeri Foto)
                        Repeater::make('agenda')
                            ->label('Agenda Kegiatan')
                            ->schema([
                                TextInput::make('event_name')->label('Nama Kegiatan')->required(),
                                TextInput::make('date')->label('Tanggal')->placeholder('20 Okt 2024'),
                                TextInput::make('location')->label('Lokasi'),

                                // 👇 FITUR BARU: MULTIPLE UPLOAD
                                FileUpload::make('gallery')
                                    ->label('Dokumentasi (Galeri)')
                                    ->multiple() // Bisa pilih banyak foto
                                    ->image()
                                    ->directory('agenda-gallery')
                                    ->maxFiles(5) // Batasi misal max 5 foto per agenda
                                    ->columnSpanFull(),
                            ])
                            ->columns(3) // Layout inputan teks
                            ->columnSpanFull(),

                        // 4. FAQ (Tetap)
                        Repeater::make('faq')
                            ->label('FAQ')
                            ->schema([
                                TextInput::make('question')->required(),
                                Textarea::make('answer')->required(),
                            ])->columns(1),

                        // 5. DOKUMEN (Tetap)
                        Repeater::make('documents')
                            ->label('Dokumen Download')
                            ->schema([
                                TextInput::make('title')->required(),
                                FileUpload::make('file')->directory('documents')->required(),
                            ])->columns(2),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Satuan Fungsi')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSatkers::route('/'),
            'create' => Pages\CreateSatker::route('/create'),
            'edit' => Pages\EditSatker::route('/{record}/edit'),
        ];
    }
}
