<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Kategori')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('count')
                    ->label('Jumlah Anggota')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('icon')
                    ->label('Ikon (Material Icons)')
                    ->options([
                        'local_police' => 'Polisi',
                        'security' => 'Satpam',
                        'admin_panel_settings' => 'Polsus',
                        'badge' => 'PNS / Lencana',
                        'groups' => 'Kelompok',
                        'person' => 'Orang',
                    ])
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('bg_color')
                    ->label('Warna Latar')
                    ->options([
                        'bg-blue-600' => 'Biru (Polri)',
                        'bg-yellow-500' => 'Kuning (PNS)',
                        'bg-green-600' => 'Hijau (Linmas/Satpam)',
                        'bg-red-600' => 'Merah (Polsus)',
                        'bg-gray-600' => 'Abu-abu',
                    ])
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('count')
                    ->label('Jumlah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('icon')
                    ->label('Ikon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bg_color')
                    ->label('Warna')
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
