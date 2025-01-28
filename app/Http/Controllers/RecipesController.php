<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="Coffee Extration API",
 *     version="1.0.0",
 *     description="Control coffe extration entries",
 * )
 */
class RecipesController extends Controller
{
    /**
    * @OA\POST(
    * path="/recipes",
    * summary="Create a new recipe",
    * description="Create a new recipe with the provided details",
    * operationId="createRecipe",
    * tags={"recipes"},
    * @OA\Parameter(
    *   name="title",
    *   in="query",
    *   description="Title of recipe",
    *   required=true,
    *   ),
    * @OA\RequestBody(
    *    required=true,
    *    @OA\JsonContent(
    *       required={"name","ingredients","instructions"},
    *       @OA\Property(property="name", type="string", example="Chocolate Cake"),
    *       @OA\Property(property="ingredients", type="string", example="Flour, Sugar, Cocoa Powder, Eggs"),
    *       @OA\Property(property="instructions", type="string", example="Mix ingredients and bake at 350 degrees for 30 minutes")
    *    ),
    * ),
    * @OA\Response(
    *    response=201,
    *    description="Recipe created successfully",
    *    @OA\JsonContent(
    *       @OA\Property(property="id", type="integer", example=1)
    *    )
    *   ),
    * @OA\Response(
    *    response=400,
    *    description="Invalid input"
    *   ),
    *)
    */
    public function store(Request $request):int{
        return 1;
    }
}
