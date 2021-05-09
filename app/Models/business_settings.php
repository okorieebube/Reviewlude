<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class business_settings extends Model
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
        'description',
        'street_address',
        'zip_code',
        'city',
        'country',
    ];


    public function getSingle($condition){

        $users = business_settings::where($condition)->first();

        return $users;

    }

    function updateBusinessSettings($requestObject){

        $business_settings = business_settings::find($requestObject->id);
        $business_settings->description = $requestObject->description ?? $business_settings->description;
        $business_settings->street_address = $requestObject->street_address ?? $business_settings->street_address;
        $business_settings->zip_code = $requestObject->zip_code ?? $business_settings->zip_code;
        $business_settings->city = $requestObject->city ?? $business_settings->city;
        $business_settings->country = $requestObject->country ?? $business_settings->country;
        $business_settings->deleted_at = $requestObject->deleted_at ?? $business_settings->deleted_at;
        if($business_settings->save()){
            return $business_settings;
        }
    }

}
