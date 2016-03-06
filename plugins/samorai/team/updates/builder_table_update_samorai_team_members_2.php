<?php namespace Samorai\Team\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSamoraiTeamMembers2 extends Migration
{
    public function up()
    {
        Schema::table('samorai_team_members', function($table)
        {
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::table('samorai_team_members', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
