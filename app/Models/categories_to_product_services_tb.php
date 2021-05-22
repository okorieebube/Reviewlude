<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categories_to_product_services_tb extends Model
{
    use HasFactory, SoftDeletes;


    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'unique_id',
        'category_id',
        'product_services_id',
    ];


    public function getSingle($condition){

        $users = categories_to_product_services_tb::where($condition)->first();

        return $users;

    }
    function getAll($condition = [], $id = 'id'){

        $categories = categories_to_product_services_tb::orderBy($id)->where($condition)->get();

        return $categories;

    }

    function updateSingle($requestObject){

        $categories_to_product_services_tb = categories_to_product_services_tb::find($requestObject->id);
        $categories_to_product_services_tb->category_id = $requestObject->category_id ?? $categories_to_product_services_tb->category_id;
        $categories_to_product_services_tb->product_services_id = $requestObject->product_services_id ?? $categories_to_product_services_tb->product_services_id;
        if($categories_to_product_services_tb->save()){
            return $categories_to_product_services_tb;
        }
    }
}
