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
        'revenue_officer_id',
        'pengajuan_name',
        'nominal',
        'assigned_payment_method',
        'assigned_funding_source',
        'path_file_pengajuan',
        'status_kelengkapan',
        'status_verifikasi',
        'path_file_status_kelengkapan',
        'status_diarsipkan',
        'is_marked',
        'status_dikembalikan',
        'digital_archive_id',
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

    public function revenue_officer()
    {
        return $this->BelongsTo(User::class, 'revenue_officer_id');
    }

    public function payment_method()
    {
        return $this->BelongsTo(PaymentMethod::class, 'assigned_payment_method');
    }

    public function funding_source()
    {
        return $this->BelongsTo(FundingSource::class, 'assigned_funding_source');
    }

    public function category_archive()
    {
        return $this->belongsTo(DigitalArchive::class, 'digital_archive_id');
    }
}
