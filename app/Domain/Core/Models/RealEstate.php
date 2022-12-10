<?php

namespace App\Domain\Core\Models;

use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function side()
    {
        return $this->belongsTo(Side::class);
    }
}
