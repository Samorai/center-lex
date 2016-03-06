<?php namespace Samorai\Practice\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSamoraiPracticeInfo extends Migration
{
    public function up()
    {
        Schema::create('samorai_practice_info', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('text');
            $table->text('small_text');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('samorai_practice_info');
    }
}
