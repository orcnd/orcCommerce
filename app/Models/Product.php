<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'name', 'description',
        'sku', 'price', 'category_id'
    ];

    /**
     * Tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags():BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Tag::class, );
    }

    public function category():HasOne
    {
        return  $this->hasOne(\App\Models\Category::class, 'id', 'category_id');
    }
}
