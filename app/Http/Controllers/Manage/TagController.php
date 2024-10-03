<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
class TagController extends Controller
{
    /**
     * Save new oen 
     * 
     * @param \Illuminate\Http\Request $r request
     * 
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    function store(Request $r) 
    {
        $r->validate(
            [
                'name' => 'required|string|max:255|unique:tags,name'
            ]
        );
        
        $t=Tag::create(
            [
                'name' => strtolower($r->name)
            ]
        );
        return response()->json($t, 200);
    }

    /**
     * Search 
     * 
     * @param string $q query 
     * 
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    function search(Request $r) 
    {
        $r->validate(
            [
                'q' => 'string|min:2|max:255'
            ]
        );
        $d=Tag::whereLike('name', "%" . $r->q  . "%")->get();
        return response()->json($d, 200);
    }
}
