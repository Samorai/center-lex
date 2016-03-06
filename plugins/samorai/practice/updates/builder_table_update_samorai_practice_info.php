<?php namespace Samorai\Practice\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSamoraiPracticeInfo extends Migration
{
    public function up()
    {
        Schema::table('samorai_practice_info', function($table)
        {
            $table->string('name');
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('samorai_practice_info', function($table)
        {
            $table->dropColumn('name');
            $table->increments('id')->unsigned()->change();
        });
    }
}
