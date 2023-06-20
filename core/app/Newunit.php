<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newunit extends Model
{
    public $timestamps = true;

    public function bcategory() {
      return $this->belongsTo('App\Oldunit');
    }

    public function language() {
      return $this->belongsTo('App\Language');
    }
}
