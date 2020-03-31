<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oollah_promotions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

}