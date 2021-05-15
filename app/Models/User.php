<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;


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
        'user_type',
        'email',
        'first_name',
        'last_name',
        'password',
        'website',
        'company_name',
        'job_title',
        'phone',
        'is_email_validated',
        'is_blocked',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_email_validated' => 'boolean',
        'is_blocked' => 'boolean',
    ];

    public function products_services(){
        return $this->hasMany('App\Models\products_services', 'user_id');
    }


    public function getSingle($condition){

        $users = User::where($condition)->first();

        return $users;

    }
    // Full texts 	id 	unique_id 	user_type 	email 	first_name 	last_name 	password 	website 	company_name 	job_title 	phone 	is_email_validated 	is_blocked 	remember_token 	deleted_at 	created_at 	updated_at

    function updateUser($requestObject){

        $user = User::find($requestObject->id);
        $user->first_name = $requestObject->first_name ?? $user->first_name;
        $user->last_name = $requestObject->last_name ?? $user->last_name;
        $user->password = Hash::make($requestObject->password) ?? $user->password;
        $user->website = $requestObject->website ?? $user->website;
        $user->company_name = $requestObject->company_name ?? $user->company_name;
        $user->job_title = $requestObject->job_title ?? $user->job_title;
        $user->phone = $requestObject->phone ?? $user->phone;
        $user->is_email_validated = $requestObject->is_email_validated ?? $user->is_email_validated;
        $user->is_blocked = $requestObject->is_blocked ?? $user->is_blocked;
        $user->deleted_at = $requestObject->deleted_at ?? $user->deleted_at;
        if($user->save()){
            return $user;
        }
    }
}
