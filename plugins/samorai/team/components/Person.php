<?php namespace Samorai\Team\Components;

use Cms\Classes\ComponentBase;

class Person extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Член команды',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'Алиас',
                'description' => 'Алиас',
                'default'     => '{{ :slug }}',
                'type'        => 'string'
            ],
        ];
    }

    public function onRun()
    {
        $this->page['member'] = \Samorai\Team\Models\TeamMembers::where(['slug'=>$this->property('slug')])->first();
    }

}