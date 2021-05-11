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
        'description',
    ];


    public function getSingle($condition){

        $users = category::where($condition)->first();

        return $users;

    }

    function updateCategory($requestObject){

        $category = category::find($requestObject->id);
        $category->name = $requestObject->name ?? $category->name;
        $category->description = $requestObject->description ?? $category->description;
        if($category->save()){
            return $category;
        }
    }
}
