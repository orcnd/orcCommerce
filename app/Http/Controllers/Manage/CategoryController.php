<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $_model, $_viewBase, $_routeBase, $_createValidate, $_updateValidate;
    function __construct()
    {
        $this->_model=\App\Models\Category::class;
        $this->_viewBase='manage.category.';
        $this->_routeBase='manage.category.';
        $this->_createValidate=[
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'required|string|max:255', 
            'parent_id' => 'nullable|numeric',
        ];
        $this->_updateValidate=[   
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'required|string|max:255', 
            'parent_id' => 'nullable|numeric',
        ];

    }
    /**
     * Index
     * 
     * @return mixed
     */
    function index()
    {
        return view(
            view: $this->_viewBase . 'index',
            data: [
                'list' => $this->_model::orderBy('name')->get(),
                '_routeBase' => $this->_routeBase
            ]
        );
    }

    /**
     * Create 
     * 
     * @return mixed
     */
    function create() 
    {
        return view(
            $this->_viewBase . 'create',
            [
                'topList' => $this->_model::all(),
                '_routeBase' => $this->_routeBase
            ]
        );
    }

    /**
     * Store
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function store(Request $request)
    {
        $request->validate($this->_createValidate);
        $item= $this->_model::create(attributes: $request->all());
        return redirect(
            route($this->_viewBase . 'show', [$item])
        );
    }


    /**
     * Shows the object
     * 
     * @param int $id id
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function show(int $id)
    {
        $object=$this->_model::findOrFail($id);
        return view(
            $this->_viewBase . 'show', 
            ['data' =>$object, '_routeBase'=> $this->_routeBase]
        );
    }


    /**
     * Edit action 
     * 
     * @param  int $id id 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function edit(int $id) 
    {
        $object=$this->_model::findOrFail($id);
        return view(
            $this->_viewBase . 'edit',
            [
                'data' =>$object, 
                '_routeBase'=> $this->_routeBase,
                'topList' => $this->_model::all(),
            ]
        );
    }

    
    /**
     * Update action 
     * 
     * @param \Illuminate\Http\Request $request req
     * @param int                      $id      id  
     * 
     * @return void
     */
    function update(Request $request, int $id)
    {
        $object=$this->_model::findOrFail($id);
        $request->validate($this->_updateValidate);
        $object->update($request->all());
        return redirect(
            route($this->_viewBase . 'show', [$object])
        );
    }
    
    /**
     * Destroy action 
     *
     * @param int $id id
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function destroy(int $id) 
    {
        $object=$this->_model::findOrFail($id);
        $object->delete();
        return redirect(
            route($this->_routeBase . 'index')
        );
    }

}
