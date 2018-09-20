<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //Fixed Table Name
    protected $table ='orders';
    
    //primary key
	public $primaryKey = 'id';
	//timestamps
	public $timestamps=true;
}
