<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionFavorite extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oollah_promotion_favorites';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

}