<?php

namespace App\Domain\Core\Models;

use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxExemption extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function real_estate()
    {
        return $this->belongsTo(RealEstate::class);
    }
}
