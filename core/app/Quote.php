<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ['id', 'name', 'email', 'lga', 'ward', 'pu', 'occup', 'edulevel', 'gender', 'haddress', 'yearob', 'ref', 'fields', 'status', 'created_at', 'updated_at', 'verified'];
}
