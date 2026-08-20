<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $cabinet_name
 * @property string $cabinet_code
 * @property int|null $total_racks
 * @property int|null $total_document
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereCabinetCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereCabinetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereTotalDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereTotalRacks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cabinet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cabinet extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabinet_name',
        'cabinet_code',
        'total_racks',
        'total_document',
        'description',
    ];

    public function files()
    {
        return ArchiveFile::whereIn(
            'document_folder_id',
            $this->folders()->pluck('id')
        )->get();
    }
}
