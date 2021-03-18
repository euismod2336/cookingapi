<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)->withPivot('amount');
    }

    public function utensils()
    {
        return $this->belongsToMany(Utensil::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
