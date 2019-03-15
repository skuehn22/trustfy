<?php
/**
 * Created by PhpStorm.
 * User: kuehn_000
 * Date: 20.08.2018
 * Time: 16:37
 */

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';
    protected $primaryKey = 'id';
}