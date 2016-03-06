<?php namespace Samorai\Team\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSamoraiTeamEducation extends Migration
{
    public function up()
    {
        Schema::create('samorai_team_education', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('year');
            $table->string('name');
            $table->text('text');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('samorai_team_education');
    }
}
