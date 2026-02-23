<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Message extends Model
{
    protected $fillable = [
    'name',    // Sesuai migration
    'phone',   // Sesuai migration
    'message', // Sesuai migration
    'status',
    'email',
    'is_read',
];

    protected static function booted()
    {
        static::updated(function ($message) {
            if ($message->isDirty('status')) {
                self::kirimNotifikasiStatusKeUser($message);
            }
        });
    }

    public static function kirimNotifikasiStatusKeUser($message)
    {
        $pesanStatus = match ($message->status) {
            'Proses' => "Halo *{$message->name}*, laporan Anda sedang dalam tahap *Proses* oleh petugas Binmas.",
            'Selesai' => "Halo *{$message->name}*, laporan Anda telah dinyatakan *Selesai*. Terima kasih.",
            default => null,
        };

        if ($pesanStatus) {
            try {
                // Menghubungi Server Node.js Bot WA Mandiri Anda
                Http::post('http://127.0.0.1:3000/send-update', [
                    'to' => $message->phone,
                    'text' => $pesanStatus
                ]);
            } catch (\Exception $e) {
                Log::error("Gagal kirim update via Bot: " . $e->getMessage());
            }
        }
    }
}