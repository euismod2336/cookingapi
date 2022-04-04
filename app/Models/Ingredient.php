<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory, SoftDeletes;

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class)->withPivot('amount', 'description', 'alternative_id');
    }
}
