<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Layanan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi Singkat')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('icon')
                    ->label('Ikon')
                    ->options([
                        'assignment_ind' => 'Registrasi / Pendaftaran',
                        'groups' => 'Forum / Kelompok',
                        'support_agent' => 'Layanan / CS',
                        'campaign' => 'Sosialisasi / Pengumuman',
                        'report_problem' => 'Pengaduan',
                        'gavel' => 'Hukum',
                        'business_center' => 'Bisnis / BUJP',
                    ])
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->label('Tautan (Link)')
                    ->placeholder('Contoh: https://google.com atau #')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon')
                    ->label('Ikon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link')
                    ->label('Tautan')
                    ->searchable(),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
