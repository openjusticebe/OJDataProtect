<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Organisation extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('vat_number')->nullable(true)->default(null);
            $table->string('address')->nullable(true)->default(null);
            $table->string('postcode')->nullable(true)->default(null);
            $table->string('city')->nullable(true)->default(null);
            $table->string('country')->nullable(true)->default(null);
            $table->string('logo_url')->nullable(true)->default(null);
            $table->text('description');
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
        Schema::dropIfExists('organisations');
    }
}
