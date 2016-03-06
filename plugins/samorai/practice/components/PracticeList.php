<?php namespace Samorai\Practice\Components;

use Cms\Classes\ComponentBase;
use Samorai\Practice\Models\PracticeInfo;

class PracticeList extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Списко практик',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->page['practices'] = PracticeInfo::all();
    }

}