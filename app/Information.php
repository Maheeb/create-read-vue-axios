<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Information
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Information newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Information newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Information query()
 * @mixin \Eloquent
 */
class Information extends Model
{
    //
    protected $table ='info';

    protected $fillable=[

        'fname',
        'lname',
        'country',
        'subject'

        ];

}
