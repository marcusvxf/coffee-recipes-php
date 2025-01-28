<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class CoffeController extends Controller
{
    /**
     * @OA\GET(
     * path="/api/coffee",
     * summary="Get all coffee extractions",
     * description="Get all coffee extractions",
     * operationId="getCoffee",
     * tags={"coffee"},
     * @OA\Parameter(
     *  name="page",
     *  in="query",
     *  description="Page number",
     *  required=false,
     * ),
     * @OA\Parameter( name="coffee_bean", in="query", description="Coffee bean type", required=false ),
     * @OA\Parameter( name="brew_method", in="query", description="Brew method", required=false ),
     * @OA\Parameter( name="grind_size", in="query", description="Grind size", required=false ),
     * @OA\Response(
     *    response=200,
     *    description="List of coffee extractions",
     *    @OA\JsonContent(
     *       type="array",
     *       @OA\Items(ref="#/components/schemas/Coffee")
     *    )
     *   ),
     * @OA\Response(
     *    response=400,
     *    description="Invalid input"
     *   ),
     *)
     */
    public function index(Request $request): LengthAwarePaginator{
        try{
            $coffees = Coffee::filter($request)->paginate();
        }catch(\Exception $e) {
            dd($e->getMessage());
        }
        return $coffees;
    }


    /**
     * @OA\POST(
     * path="/api/coffee",
     * summary="Create a new coffee extraction",
     * description="Create a new coffee extraction with the provided details",
     * operationId="createCoffe",
     * tags={"coffee"},
     * @OA\RequestBody(
     *    required=true,
     *    @OA\JsonContent(
     *       required={"coffee_bean","brew_method","grind_size","water_amount"},
     *       @OA\Property(property="coffee_bean", type="string", example="Arabica"),
     *       @OA\Property(property="brew_method", type="string", example="Pour Over"),
     *       @OA\Property(property="grind_size", type="string", example="Medium"),
     *       @OA\Property(property="water_amount", type="string", example="500ml"),
     *       @OA\Property(property="user_id", type="integer", example="1"),
     *       @OA\Property(property="rating", type="string", example="5"),
     *       @OA\Property(property="notes", type="string", example="Sweet"),
     *       @OA\Property(property="water_temp", type="string", example="90C"),
     *       @OA\Property(property="coffee_qtd", type="string", example="10g")
     *    ),
     * ),
     * @OA\Response(
     *    response=201,
     *    description="Coffee extraction created successfully",
     *    @OA\Items(ref="#/components/schemas/Coffee")
     *   ),
     * @OA\Response(
     *    response=400,
     *    description="Invalid input"
     *   ),
     *)
     */
    public function store(Request $request){

        try{
            $valid_values = array_filter($request->only((new Coffee)->getFillable()));
            $coffee = Coffee::create($valid_values);
        }catch(\Exception $e){
            dd($e->getMessage());
        }
        return $coffee;
    }
    /**
     * @OA\GET(
     * path="/api/coffee/{coffee}",
     * summary="Get a coffee extraction",
     * description="Get a coffee extraction",
     * operationId="getCoffe",
     * tags={"coffee"},
     * @OA\Parameter(
     *  name="coffee",
     *  in="path",
     *  description="Coffee ID",
     *  required=true,
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Coffee extraction",
     *    @OA\JsonContent(ref="#/components/schemas/Coffee")
     *   ),
     * @OA\Response(
     *    response=400,
     *    description="Invalid input"
     *   ),
     *)
     */
    public function show(Coffee $coffee): Coffee{
        return $coffee;
    }

    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Coffee $coffee
     * @return \App\Models\Coffee
     * @OA\PUT(
     * path="/api/coffee/{coffee}",
     * summary="Update a coffee extraction",
     * description="Update a coffee extraction with the provided details",
     * operationId="updateCoffe",
     * tags={"coffee"},
     * @OA\Parameter( name="coffee", in="path", description="Coffee ID", required=true ),
     * @OA\RequestBody(
     *    required=true,
     *    @OA\JsonContent(
     *       required={"coffee_bean","brew_method","grind_size","water_amount"},
     *       @OA\Property(property="coffee_bean", type="string", example="Arabica"),
     *       @OA\Property(property="brew_method", type="string", example="Pour Over"),
     *       @OA\Property(property="grind_size", type="string", example="Medium"),
     *       @OA\Property(property="water_amount", type="string", example="500ml"),
     *       @OA\Property(property="user_id", type="integer", example="1"),
     *       @OA\Property(property="rating", type="string", example="5"),
     *       @OA\Property(property="notes", type="string", example="Sweet"),
     *       @OA\Property(property="water_temp", type="string", example="90C")
     *    ),
     * ),
     * @OA\Response(
     *    response=201,
     *    description="Coffee extraction created successfully",
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
    public function update(Request $request, Coffee $coffee): Coffee{
        $valid_values = array_filter($request->only(Coffee::getFillable()));
        $coffee->update($valid_values);
        return $coffee;
    }

}
