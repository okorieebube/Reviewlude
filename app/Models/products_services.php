<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class products_services extends Model
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
        'user_id',
        'name',
        'slug',
        'description',
        'category',
        'cover_photo',
        'status',
        'type',
        'total_reviews',
        'score',
        'tags',
        'performance',
    ];

    public function company(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function categories(){
        return $this->belongsTo('App\Models\category', 'category');
    }

    public function getSingle($condition){

        $products_services = products_services::where($condition)->first();

        return $products_services;

    }
    public function getAll($condition, $id = 'id', $desc = 'desc'){

        return products_services::where($condition)->orderBy($id, $desc)->get();

    }

    function updateProductServices($requestObject){

        $products_services = products_services::find($requestObject->id);
        $products_services->name = $requestObject->name ?? $products_services->name;
        $products_services->slug = $requestObject->slug ?? $products_services->slug;
        $products_services->category = $requestObject->category ?? $products_services->category;
        $products_services->cover_photo = $requestObject->cover_photo ?? $products_services->cover_photo;
        $products_services->status = $requestObject->status ?? $products_services->status;
        $products_services->total_reviews = $requestObject->total_reviews ?? $products_services->total_reviews;
        $products_services->score = $requestObject->score ?? $products_services->score;
        $products_services->tags = $requestObject->tags ?? $products_services->tags;
        $products_services->performance = $requestObject->performance ?? $products_services->performance;
        if($products_services->save()){
            return $products_services;
        }
    }
}
