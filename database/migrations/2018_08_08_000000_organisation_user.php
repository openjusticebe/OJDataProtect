<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrganisationUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organisation_id');
            $table->integer('user_id');
            $table->string('member_type');
            $table->tinyInteger('is_external');
            $table->tinyInteger('is_admin');
            $table->timestamps();
        });
    }


    //abréviation :
    // Alias :
    // Dénomination en néerlandais :
    // adresse :
    // statut :
    // Numéro BCE :
    // numéro de téléphone général :
    // adresse e-mail générale :
    // site Internet :

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_user');
    }
}
