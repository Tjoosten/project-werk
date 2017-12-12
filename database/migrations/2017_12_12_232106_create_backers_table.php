<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname'); 
            $table->string('lastname'); 
            $table->string('email'); 
            $table->string('street_name'); 
            $table->string('huis_nr'); 
            $table->string('postal_code'); 
            $table->string('city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backers');
    }
}
