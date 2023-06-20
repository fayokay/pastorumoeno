<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vin extends Model
{
    protected $fillable = ['id', 'pvc', 'fn', 'sn', 'yob', 'state', 'lga', 'ward', 'pu', 'pucode', 'gender', 'occupation', 'status', 'created_at', 'updated_at'];
}
