<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    protected $fillable = [
        'id', 'suspeito', 'comparsa', 'crime', 'data', 'id_suspeito'
    ];

    protected $table = 'Crimes';


}
