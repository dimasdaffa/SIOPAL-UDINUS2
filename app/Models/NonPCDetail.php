<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class NonPCDetail extends Model
{
    use HasFactory;

    protected $table = 'non_pc_details';
    protected $guarded = ['id'];

    public function inventory(): MorphOne
    {
        return $this->morphOne(Inventory::class, 'inventoriable');
    }
}
