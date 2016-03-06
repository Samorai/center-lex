<?php namespace Samorai\Team;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Samorai\Team\Components\Members' => 'team',
            'Samorai\Team\Components\Person' => 'person',
        ];
    }

    public function registerSettings()
    {
    }
}
