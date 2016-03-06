<?php namespace Samorai\Team\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSamoraiTeamMembers extends Migration
{
    public function up()
    {
        Schema::create('samorai_team_members', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('position');
            $table->string('phone');
            $table->string('email');
            $table->text('experiences');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('samorai_team_members');
    }
}
