<?php
/**
 * CategoryController.php
 * 
 * PHP version 8.2
 *
 * @category  Controller
 * @package   App\Http\Controllers
 * @author    Orcun Candan <orcuncandan@gmail.com>
 * @copyright 2024 Orcun Candan
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/orcuncandan/orcCommerce
 */


namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;

/**
 * Class CategoryController
 * 
 * @category Controller
 * @tag      Category
 * @package  App\Http\Controllers
 * @author   Orcun Candan  <orcuncandan@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/orcuncandan/orcCommerce
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource
     * 
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $categories= Category::all();
        return response()->json($categories, 200);
    }

    /**
     * Store a newly created resource in storage
     * 
     * @param \App\Http\Requests\Category\CreateRequest $request request
     * 
     * @return mixed
     */
    public function store(CreateRequest $request): mixed
    {
        $item= Category::create($request->all());
        return response()->json($item, 201);
    }

    /**
     * Get the item
     * 
     * @param string $id id
     * 
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function show(string $id):mixed
    {
        $item= Category::findOrFail($id);
        return response()->json($item, 200);
    }

    /**
     * Update the specified resource in storage
     * 
     * @param \App\Http\Requests\Category\UpdateRequest $request request
     * @param string                                    $id      id
     * 
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, string $id):mixed
    {
        $item= Category::findOrFail($id);
        $item->update($request->all());
        return response()->json($item, 200);
    }

    /**
     * Delete the specified resource from storage.
     * 
     * @param string $id id
     * 
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function destroy(string $id):mixed
    {
        $item= Category::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
