<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drinks extends Model
{
    //Fixed Table Name
    protected $table ='drinks';
    
    //primary key
	public $primaryKey = 'id';
	//timestamps
	public $timestamps=true;
}
