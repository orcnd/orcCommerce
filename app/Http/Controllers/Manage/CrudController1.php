<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrudController1 extends Controller
{
    function __construct(
        public string $_model, public string $_viewBase,
        public string $_routeBase, public int $indexPageSize=20
    ){}
    /**
     * Gives validation array for create action
     *
     * @return array
     */
    private function _getCreateValidateArray():array
    {
        return [];
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
        return [];
    }

    /**
     * Store hook runs after store
     *
     * @param \Illuminate\Http\Request $r request
     *
     * @return void
     */
    function storeHook(Request $request, mixed $item)
    {
    }


    /**
     * Update hook runs after update
     *
     * @param \Illuminate\Http\Request $request req
     * @param int                      $id      id
     *
     * @return void
     */
    function updateHook(Request $request, int $id, mixed $item)
    {
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
                'list' => $this->_model::orderBy('name')->paginate($this->indexPageSize),
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
        $request->validate($this->_getCreateValidateArray());
        $item= $this->_model::create(attributes: $request->all());
        $this->storeHook(request: $request, item:  $item);
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
     * @param int $id id
     *
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
        $request->validate($this->_getUpdateValidateArray($object));
        $object->update($request->all());
        $this->updateHook(request: $request, id: $id, item: $object);
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
