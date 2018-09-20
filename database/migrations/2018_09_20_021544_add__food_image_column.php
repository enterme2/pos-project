<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFoodImageColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food',function($table){
            $table->string('food_image');
        });
        Schema::table('drinks',function($table){
            $table->string('drinks_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food',function($table){
            $table->dropColumn('food_image');
        });
        Schema::table('drinks',function($table){
            $table->dropColumn('drinks_image');
        });
    }
}
