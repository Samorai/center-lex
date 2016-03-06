<?php namespace Samorai\Practice\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSamoraiPracticeTeam extends Migration
{
    public function up()
    {
        Schema::table('samorai_practice_team', function($table)
        {
            $table->integer('practice_info_id');
            $table->integer('team_members_id');
            $table->dropColumn('practice_id');
            $table->dropColumn('team_id');
        });
    }
    
    public function down()
    {
        Schema::table('samorai_practice_team', function($table)
        {
            $table->dropColumn('practice_info_id');
            $table->dropColumn('team_members_id');
            $table->integer('practice_id');
            $table->integer('team_id');
        });
    }
}
