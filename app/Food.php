<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //Fixed Table Name
    protected $table ='food';
    
    //primary key
	public $primaryKey = 'id';
	//timestamps
	public $timestamps=true;
}
