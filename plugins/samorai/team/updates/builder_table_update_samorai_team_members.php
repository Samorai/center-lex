<?php namespace Samorai\Team\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSamoraiTeamMembers extends Migration
{
    public function up()
    {
        Schema::table('samorai_team_members', function($table)
        {
            $table->string('facebook');
            $table->string('twitter');
            $table->string('google');
            $table->string('linkedin');
        });
    }
    
    public function down()
    {
        Schema::table('samorai_team_members', function($table)
        {
            $table->dropColumn('facebook');
            $table->dropColumn('twitter');
            $table->dropColumn('google');
            $table->dropColumn('linkedin');
        });
    }
}
