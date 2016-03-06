<?php namespace Samorai\Team\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSamoraiTeamEducation2 extends Migration
{
    public function up()
    {
        Schema::table('samorai_team_education', function($table)
        {
            $table->renameColumn('team_id', 'team_members_id');
        });
    }
    
    public function down()
    {
        Schema::table('samorai_team_education', function($table)
        {
            $table->renameColumn('team_members_id', 'team_id');
        });
    }
}
