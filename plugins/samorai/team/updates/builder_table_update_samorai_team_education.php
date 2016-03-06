<?php namespace Samorai\Team\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSamoraiTeamEducation extends Migration
{
    public function up()
    {
        Schema::table('samorai_team_education', function($table)
        {
            $table->integer('team_id');
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('samorai_team_education', function($table)
        {
            $table->dropColumn('team_id');
            $table->increments('id')->unsigned()->change();
        });
    }
}
