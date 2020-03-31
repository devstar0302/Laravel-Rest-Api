<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Localfinds extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'findmiin_localfinds';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

}