<?php namespace Samorai\Practice;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Samorai\Practice\Components\PracticeList' => 'practice_list',
            'Samorai\Practice\Components\Practice' => 'practice_info',
        ];
    }

    public function registerSettings()
    {
    }
}
