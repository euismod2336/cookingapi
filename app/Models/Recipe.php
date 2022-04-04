<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)->withPivot(['amount', 'description', 'alternative_id']);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['rating', 'description', 'favorite']);
    }

    public function utensils()
    {
        return $this->belongsToMany(Utensil::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('state', '>', 0);
    }

    public function scopeVegan(Builder $query)
    {
        return $query->whereDoesntHave(
            'ingredient',
            static function (Builder $q) {
                $q->where('vegan', 0);
            }
        );
    }

    public function scopeVegetarian(Builder $query)
    {
        return $query->whereDoesntHave(
            'ingredient',
            static function (Builder $q) {
                $q->where('vegetarian', 0);
            }
        );
    }
}
