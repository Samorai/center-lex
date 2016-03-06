<?php namespace Samorai\Practice\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSamoraiPracticeTeam extends Migration
{
    public function up()
    {
        Schema::create('samorai_practice_team', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('practice_id');
            $table->integer('team_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('samorai_practice_team');
    }
}
