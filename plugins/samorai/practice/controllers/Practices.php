<?php namespace Samorai\Practice\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Practices extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Samorai.Practice', 'practice-main');
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $practiceId) {
                if (!$practice = \Samorai\Practice\Models\PracticeInfo::find($practiceId)) {
                    continue;
                }

                $practice->delete();
            }
        }
        return $this->listRefresh();
    }
}