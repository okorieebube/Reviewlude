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
        'total_reviews',
        'score',
        'tags',
        'performance',
    ];


    public function getSingle($condition){

        $products_services = products_services::where($condition)->first();

        return $products_services;

    }

    function updateProductServices($requestObject){

        $products_services = business_settings::find($requestObject->id);
        $products_services->total_reviews = $requestObject->total_reviews ?? $products_services->total_reviews;
        $products_services->score = $requestObject->score ?? $products_services->score;
        $products_services->tags = $requestObject->tags ?? $products_services->tags;
        $products_services->performance = $requestObject->performance ?? $products_services->performance;
        if($products_services->save()){
            return $products_services;
        }
    }
}
