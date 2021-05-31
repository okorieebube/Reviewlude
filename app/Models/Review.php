<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
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
        'product_id',
        'review',
        'star_rating',
        'repy_main_id',
        'is_blocked',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function settings(){
        return $this->belongsTo('App\Models\business_settings', 'user_id');
    }
    public function product(){
        return $this->belongsTo('App\Models\products_services', 'product_id');
    }

    public function getSingle($condition){

        $data = Review::where($condition)->first();

        return $data;

    }
    public function getAll($condition = [], $id = 'id', $desc = 'desc'){

        return Review::where($condition)->orderBy($id, $desc)->get();

    }

    function Update_($requestObject){

        $data = Review::find($requestObject->id);
        $data->is_blocked = $requestObject->is_blocked ?? $data->is_blocked;
        if($data->save()){
            return $data;
        }
    }
}
