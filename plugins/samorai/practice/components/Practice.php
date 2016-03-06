<?php namespace Samorai\Practice\Components;

use Cms\Classes\ComponentBase;

class Practice extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Практика',
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
        $this->page['practice'] = \Samorai\Practice\Models\PracticeInfo::where(['alias'=>$this->property('slug')])->first();
    }

}