<?php namespace Samorai\Team\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSamoraiTeamLanguages extends Migration
{
    public function up()
    {
        Schema::create('samorai_team_languages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('language');
            $table->integer('team_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('samorai_team_languages');
    }
}
