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
        //TODO: redesign the database and entities in the views
        //TODO: add output mails

        /*
         Ref_update trigger for each year update.

         IF((select COUNT(*) from courriers) < 1 or DATE_FORMAT(NEW.dateReception, '%y') not in( (select DATE_FORMAT(dateReception, '%y') from courriers) )) then
         SET NEW.id = (DATE_FORMAT(NEW.dateReception, '%y'))+1000;
         ELSE
         SET NEW.id = (select MAX(id) + 1000 from courriers where MOD(id,100) = DATE_FORMAT(NEW.dateReception, '%y') ORDER by id DESC LIMIT 1);
         end if
         CREATE TRIGGER `ref_update` BEFORE INSERT ON `courriers`
         FOR EACH ROW IF((select COUNT(*) from courriers) < 1 or DATE_FORMAT(NEW.dateReception, '%y') not in( (select DATE_FORMAT(dateReception, '%y') from courriers) )) then
         SET NEW.id = (DATE_FORMAT(NEW.dateReception, '%y'))+1000;
         ELSE
         SET NEW.id = (select MAX(id) + 1000 from courriers where MOD(id,100) = DATE_FORMAT(NEW.dateReception, '%y') ORDER by id DESC LIMIT 1);
         end if
        */


        Schema::create('courriers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('expediteur');
            $table->string('recepteur');
            $table->string('sujet');
            $table->text('corps');
            $table->text('commentaires')->nullable(true);
            $table->string('objet');
            $table->string('traiterPar');
            $table->tinyInteger('urgence');
            $table->tinyInteger('statut');
            $table->date('dateReception');
            $table->text('traitement')->nullable(true);
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
