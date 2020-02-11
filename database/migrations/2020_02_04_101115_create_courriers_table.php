<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //TODO: configure the id in the courriers table to be number/year ex: "3241/20"
        //TODO: design the input group in the edit and create views
        //TODO: redesign the database and entities in the views
        //TODO: add output mails
        //create trigger insertion on courriers after insert as
        //begin
        //	declare @ref varchar(25), sender varchar(250), receiver varchar(250), sujet varchar(250), corps varchar(500), commentaires varchar(250), objet varchar(250), traiterPar varchar(250), urgence int, statut int, dateReception date, traitement varchar(500);
        //    select @ref = id from inserted;
        //	set @ref = @ref + '/' + DATE_FORMAT(CURDATE(), '%y');
        //	insert into courriers select @ref, @sender, @receiver, @sujet, @corps, @commentaires, @objet, @traiterPar, @urgence, @statut, @dateReception, @traitement from inserted;
        //end


        Schema::create('courriers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender');
            $table->string('receiver');
            $table->string('subject');
            $table->text('corps');
            $table->text('comments')->nullable(true);
            $table->string('object');
            $table->string('treater');
            $table->tinyInteger('urgency');
            $table->tinyInteger('status');
            $table->date('receptionDate');
            $table->text('traitment')->nullable(true);
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
        Schema::dropIfExists('courriers');
    }
}
