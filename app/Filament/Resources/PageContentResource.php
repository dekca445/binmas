<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageContentResource\Pages;
use App\Filament\Resources\PageContentResource\RelationManagers;
use App\Models\PageContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageContentResource extends Resource
{
    protected static ?string $model = PageContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('page')
                    ->label('Halaman')
                    ->options([
                        'home' => 'Beranda',
                        'profil' => 'Profil',
                        'kontak' => 'Kontak',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('section')
                    ->label('Bagian (Section)')
                    ->required()
                    ->placeholder('Contoh: hero, sambutan, sejarah'),
                Forms\Components\TextInput::make('key')
                    ->label('Kata Kunci (Key)')
                    ->placeholder('Contoh: title, content'),
                Forms\Components\RichEditor::make('content')
                    ->label('Konten Teks')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar (Opsional)')
                    ->image()
                    ->directory('page-contents')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page')
                    ->label('Halaman')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('section')
                    ->label('Bagian')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('key')
                    ->label('Kata Kunci')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('page')
                    ->options([
                        'home' => 'Beranda',
                        'profil' => 'Profil',
                        'kontak' => 'Kontak',
                    ]),
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
            'index' => Pages\ListPageContents::route('/'),
            'create' => Pages\CreatePageContent::route('/create'),
            'edit' => Pages\EditPageContent::route('/{record}/edit'),
        ];
    }
}
