<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiques', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->date('date_jr');
            $table->time('hr_depart')->nullable();
            $table->time('hr_arrive');
            $table->tinyInteger('statut')->default('1'); //permet d'indiquer si la personne est presente ou absente
                                            //afin de savoir si l'heure doit etre affecter a l arriver 
                                            // ou au depart
            $table->primary(array('date_jr','user_id'));
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('historiques');
    }
}
