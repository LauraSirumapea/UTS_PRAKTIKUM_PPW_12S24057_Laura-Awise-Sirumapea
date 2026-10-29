<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Peminjaman;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_code',
        'name',
        'specification',
        'daily_rental_fee',
        'condition',
        'status',
        'image_path',
        'kategori_id',
        'stok',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
    public function peminjamans()
{
    return $this->hasMany(Peminjaman::class);
}
}