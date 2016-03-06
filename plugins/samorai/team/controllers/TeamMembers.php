<?php namespace Samorai\Team\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class TeamMembers extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Samorai.Team', 'team', 'team-members');
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $memberId) {
                if (!$member = \Samorai\Team\Models\TeamMembers::find($memberId)) {
                    continue;
                }

                $member->delete();
            }
        }
        return $this->listRefresh();
    }
}