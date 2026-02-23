<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityLogResource\Pages;
use App\Filament\Resources\ActivityLogResource\RelationManagers;
use App\Models\ActivityLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActivityLogResource extends Resource
{
    protected static ?string $model = ActivityLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

protected static ?string $navigationLabel = 'Log Keamanan';
protected static ?string $navigationGroup = 'Sistem Kontrol';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('created_at')
                ->label('Waktu Kejadian')
                ->dateTime('d M Y, H:i:s')
                ->sortable(),
            
            Tables\Columns\TextColumn::make('ip_address')
                ->label('IP Address')
                ->searchable()
                ->copyable(),
            
            Tables\Columns\BadgeColumn::make('activity')
                ->label('Aktivitas Mencurigakan')
                ->color(fn (string $state): string => match ($state) {
                    'Klik Kanan Terdeteksi' => 'warning',
                    'Mencoba Buka F12 (Inspect)' => 'danger',
                    default => 'gray',
                }),

            Tables\Columns\TextColumn::make('user_agent')
                ->label('Browser/Perangkat')
                ->limit(50),
        ])
        ->filters([
            // Filter berdasarkan jenis aktivitas
            Tables\Filters\SelectFilter::make('activity')
                ->options([
                    'Klik Kanan Terdeteksi' => 'Klik Kanan',
                    'Mencoba Buka F12 (Inspect)' => 'Inspect Element',
                ]),
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
        ])
        ->bulkActions([]); // Matikan hapus massal agar bukti tidak mudah dihilangkan
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
            'index' => Pages\ListActivityLogs::route('/'),
            'create' => Pages\CreateActivityLog::route('/create'),
            'view' => Pages\ViewActivityLog::route('/{record}'),
            'edit' => Pages\EditActivityLog::route('/{record}/edit'),
        ];
    }
}
