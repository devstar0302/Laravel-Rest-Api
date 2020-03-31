<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oollah_user_books';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

}