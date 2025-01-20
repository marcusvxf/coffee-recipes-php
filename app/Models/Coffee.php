<?php

namespace App\Models;

use App\Filters\CoffeFilters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     title="Coffee",
 *     description="Coffee model",
 * @OA\Property( property="id", type="integer", example="1" ),
 * @OA\Property( property="coffe_bean", type="string", example="Arabica" ),
 * @OA\Property( property="brew_method", type="string", example="Pour Over" ),
 * @OA\Property( property="grind_size", type="string", example="Medium" ),
 * @OA\Property( property="water_amount", type="string", example="500ml" ),
 * @OA\Property( property="user_id", type="integer", example="1" ),
 * @OA\Property( property="rating", type="string", example="5" ),
 * @OA\Property( property="notes", type="string", example="Sweet" ),
 * @OA\Property( property="water_temp", type="string", example="90C" ),
 * )
 */
class Coffee extends Model
{
            /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'coffee_qtd',
        'brew_method',
        'grind_size',
        "water_amount",
        "user_id",
        "rating",
        "notes",
        "water_temp",
        "coffee_bean"
    ];
    

    protected $table = 'coffee';

    public function scopeFilter(Builder $builder, Request $request): Builder
    {
        return (new CoffeFilters($request))->filter($builder);
    }

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipes::class);
    }


}
