<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
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
        'name',
        'slug',
        'description',
    ];

    // public function products_services(){
    //     return $this->hasMany('App\Models\products_services', 'category');
    // }

    public function getSingle($condition){

        $users = category::where($condition)->first();

        return $users;

    }
    function getAll( $id = 'id',$condition = []){

        $categories = category::orderBy($id)->where($condition)->get();

        return $categories;

    }
    // public function getAllUsers($condition, $id = 'id', $desc = 'desc'){

    //     $users = User::orderBy($id, $desc)->where($condition)->get();

    //     return $users;

    // }

    function updateSingle($requestObject){

        $category = category::find($requestObject->id);
        $category->name = $requestObject->name ?? $category->name;
        $category->slug = $requestObject->slug ?? $category->slug;
        $category->description = $requestObject->description ?? $category->description;
        if($category->save()){
            return $category;
        }
    }
}
