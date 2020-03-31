<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFavorite extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oollah_news_favorites';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

}