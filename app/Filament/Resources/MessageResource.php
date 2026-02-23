<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Models\Message; // Memastikan model terhubung
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationLabel = 'Laporan Masuk';

    /**
     * KEAMANAN KETAT: Membatasi izin akses Admin
     */
    public static function canCreate(): bool
    {
        return false; // Admin dilarang menambah laporan manual
    }

    public static function canDelete($record): bool
    {
        return false; // Admin dilarang menghapus laporan (otomatis via scheduler)
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Laporan Masyarakat')
                    ->description('Seluruh data pelapor dikunci untuk menjaga integritas informasi.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Pelapor')
                            ->disabled(), // Tidak bisa diedit
                        Forms\Components\TextInput::make('phone')
                            ->label('WhatsApp')
                            ->disabled(), // Tidak bisa diedit
                        Forms\Components\TextInput::make('email')
                            ->disabled(), // Tidak bisa diedit
                        Forms\Components\Textarea::make('message')
                            ->label('Isi Pesan/Aduan')
                            ->disabled() // Tidak bisa diedit
                            ->columnSpanFull(),
                        
                        // Admin hanya diperbolehkan mengubah status ini
                        Forms\Components\Select::make('status')
                            ->options([
                                'Baru' => 'Baru',
                                'Proses' => 'Proses',
                                'Selesai' => 'Selesai',
                            ])
                            ->required()
                            ->native(false), 
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Masuk')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pelapor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('WhatsApp')
                    ->icon('heroicon-m-phone')
                    ->copyable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Baru' => 'danger',
                        'Proses' => 'warning',
                        'Selesai' => 'success',
                        default => 'gray',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Baru' => 'Baru',
                        'Proses' => 'Proses',
                        'Selesai' => 'Selesai',
                    ]),
            ])
            ->headerActions([
                // Fitur Export Multi Format sesuai permintaan
                ExportAction::make()->exports([
                    ExcelExport::make()
                        ->fromTable()
                        ->withFilename('Laporan_Binmas_' . date('Y-m-d'))
                ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(), // Mengarahkan ke ViewMessage.php
                Tables\Actions\EditAction::make()
                    ->label('Update Status'),
            ])
            ->bulkActions([
                // Kosong: Menghapus fitur Bulk Delete agar aman
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMessages::route('/'),
            'view' => Pages\ViewMessage::route('/{record}'), // Sekarang sudah aman
            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }
}