<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER ref_update BEFORE INSERT ON `courriers` FOR EACH ROW
            BEGIN
                IF((select COUNT(*) from courriers) < 1 or DATE_FORMAT(NEW.dateReception, \'%y\') not in( (select DATE_FORMAT(dateReception, \'%y\') from courriers) )) then
                    SET NEW.id = (DATE_FORMAT(NEW.dateReception, \'%y\'))+1000;
                ELSE
                    SET NEW.id = (select MAX(id) + 1000 from courriers where MOD(id,100) = DATE_FORMAT(NEW.dateReception, \'%y\') GROUP BY type ORDER by id DESC LIMIT 1);
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `ref_update`');
    }
}
