<?php
namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Models\Tag;
use File;
use Intervention\Image\ImageManager;
class ProductController extends CrudController1
{
    function __construct()
    {
        parent::__construct(
            _model: \App\Models\Product::class,
            _viewBase: 'manage.product.',
            _routeBase: 'manage.product.',
            indexPageSize:10
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
            'sku' => 'required|string|max:255|unique:products,sku',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'category_id' => 'nullable|numeric',
            'images.*' => 'mimes:jpg,jpeg,png|max:10000',
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
            'slug' => 'required|string|max:255|unique:products,sku,' . $object->sku,
            'description' => 'required|string|max:255',
            'parent_id' => 'nullable|numeric',
        ];
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
                'categories' => \App\Models\Category::all(),
                '_routeBase' => $this->_routeBase
            ]
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
                'categories' => \App\Models\Category::all(),
                'tags' => $object->tags()->pluck('name')->toArray(),
                '_routeBase'=> $this->_routeBase,
                'topList' => $this->_model::all(),
            ]
        );
    }


    function storeHook(Request $request, mixed $item)
    {
        $tags=$request->tags;
        $tags=(strpos($tags, ',') !== false)?explode(',', $tags):[$tags];
        $fTags=Tag::whereIn(column: 'name', values: $tags)->get();
        $item->tags()->attach($fTags);

        $im=new ImageManager(
            new \Intervention\Image\Drivers\Gd\Driver()
        );

        $imageDirName=$item->getImageDirName();

        File::makeDirectory('product-images/' . $imageDirName);
        foreach ($request->images as $k=>$image) {
            $t=$im->read($image);
            $enc=$t->toWebp();
            $enc->save(public_path('product-images/' . $imageDirName . '/' . $k . '.webp') );
        }

    }


    function updateHook(Request $request, int $id, mixed $item)
    {
        $item->tags()->detach();
        $tags=$request->tags;
        $tags=(strpos($tags, ',') !== false)?explode(',', $tags):[$tags];
        $fTags=Tag::whereIn(column: 'name', values: $tags)->get();
        $item->tags()->attach($fTags);
    }

}
