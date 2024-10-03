<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;

class CategoryController extends CrudController1
{
    function __construct()
    {
        parent::__construct(
            _model: \App\Models\Category::class,
            _viewBase: 'manage.category.',
            _routeBase: 'manage.category.'
        );
    }
    /**
     * Gives validation array for create action 
     * 
     * @return array
     */
    private function _getCreateValidateArray():array 
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'required|string|max:255', 
            'parent_id' => 'nullable|numeric',
        ];
    }

    /**
     * Gives update validation array 
     * 
     * @param mixed $object object 
     * 
     * @return array
     */
    private function _getUpdateValidateArray($object):array 
    {
        return [   
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $object->id,
            'description' => 'required|string|max:255', 
            'parent_id' => 'nullable|numeric',
        ];
    }
}
