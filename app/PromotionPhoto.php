<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionPhoto extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oollah_promotion_photos';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

}