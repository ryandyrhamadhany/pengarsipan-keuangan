<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'finance_officers_id',
        'pengajuan_name',
        'path_file_pengajuan',
        'status_kelengkapan',
        'status_verifikasi',
        'path_file_status_kelengkapan',
        'status_diarsipkan',
        'status_dikembalikan',
        'message',
    ];

    public function user()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function finance_officer()
    {
        return $this->BelongsTo(User::class, 'finance_officers_id');
    }
}
