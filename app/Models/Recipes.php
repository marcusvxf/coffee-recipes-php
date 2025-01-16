<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];


    protected $table = 'recipes';

    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredients::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
