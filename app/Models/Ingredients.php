<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingredients extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'quantity',
        'recipe_id',
    ];

    protected $table = 'ingredients';

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipes::class);
    }
}
