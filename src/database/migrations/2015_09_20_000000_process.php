<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Process extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('organisation_id');
            $table->text('description');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            
            $table->integer('reminder_every')->unsigned()->nullable()->default(null); // in days // with loop
            $table->integer('safe_keeping_duration')->unsigned()->nullable()->default(null); // in days
            $table->timestamp('start_date')->nullable()->default(null);
            $table->string('status'); // archived or pending
            
            $table->timestamp('notified_at')->nullable()->default(null);
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
        Schema::dropIfExists('processes');
    }
}
