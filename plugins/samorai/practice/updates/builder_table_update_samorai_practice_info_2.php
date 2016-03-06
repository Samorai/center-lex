<?php namespace Samorai\Practice\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSamoraiPracticeInfo2 extends Migration
{
    public function up()
    {
        Schema::table('samorai_practice_info', function($table)
        {
            $table->string('alias');
        });
    }
    
    public function down()
    {
        Schema::table('samorai_practice_info', function($table)
        {
            $table->dropColumn('alias');
        });
    }
}
