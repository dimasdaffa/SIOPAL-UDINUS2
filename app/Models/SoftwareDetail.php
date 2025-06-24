<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class SoftwareDetail extends Model
{
    use HasFactory;

    protected $table = 'software_details';
    protected $guarded = ['id'];

    public function inventory(): MorphOne
    {
        return $this->morphOne(Inventory::class, 'inventoriable');
    }
}
