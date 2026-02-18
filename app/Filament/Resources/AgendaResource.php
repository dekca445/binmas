<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Filament\Resources\AgendaResource\RelationManagers;
use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str; // 👈 Jangan lupa import ini
use Filament\Forms\Set;     // 👈 Jangan lupa import ini
class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // 1. INPUT JUDUL (Generator Slug)
                Forms\Components\TextInput::make('title')
                    ->label('Nama Kegiatan')
                    ->required()
                    ->live(onBlur: true) // Generate saat kursor pindah
                    ->afterStateUpdated(
                        fn(string $operation, $state, Set $set) =>
                        $operation === 'create' ? $set('slug', Str::slug($state)) : null
                    ),

                // 2. INPUT SLUG (Wajib Ada untuk Database)
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->readOnly()
                    ->unique(ignoreRecord: true)
                    ->helperText('Terisi otomatis dari nama kegiatan'),

                // 3. DROPDOWN SATKER
                Forms\Components\Select::make('satker_name')
                    ->label('Milik Satker')
                    ->options(\App\Models\Satker::all()->pluck('name', 'name'))
                    ->required(),

                Forms\Components\DatePicker::make('date')
                    ->label('Tanggal Pelaksanaan')
                    ->required(),

                Forms\Components\TextInput::make('location')
                    ->label('Lokasi Kegiatan'),

                Forms\Components\FileUpload::make('gallery')
                    ->multiple()
                    ->directory('agendas')
                    ->columnSpanFull()
                    ->label('Dokumentasi Kegiatan (Bisa Upload Banyak)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Nama Kegiatan')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('satker_name')
                    ->label('Satker')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi')
                    ->limit(30),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
}
