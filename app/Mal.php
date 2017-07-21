<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mal extends Model
{
    //
    protected fillable = ['nominal'];

    public function orang()
    {
    	# code...
    	return $this->belongsTo('App\Author');
    }
}
