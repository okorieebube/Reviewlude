<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tickets';
    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    protected $keyType = 'unique_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['unique_id','main_id', 'user_id','title', 'message',  'main'];


    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function get_single($condition){

        $data = ticket::where($condition)->first();

        return $data;

    }
    public function get_all($condition = [], $id = 'id', $desc = 'desc'){

        return ticket::where($condition)->orderBy($id, $desc)->get();

    }
}
