<?php namespace Samorai\Team\Components;

use Cms\Classes\ComponentBase;

class Members extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Список команды',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }


    public function onRun()
    {
        $this->page['members'] = \Samorai\Team\Models\TeamMembers::all();
    }
}