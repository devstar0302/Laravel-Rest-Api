<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oollah_type';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

}