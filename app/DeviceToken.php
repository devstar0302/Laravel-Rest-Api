<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceToken extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'weebie_fcm';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

}