<?php namespace Samorai\Team\Models;

use Model;

/**
 * Model
 */
class TeamMembers extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    public $attachOne = [
        'image' => 'System\Models\File'
    ];

    public $hasMany = [
        'educations' => 'Samorai\Team\Models\Education',
        'languages' => 'Samorai\Team\Models\Language',
    ];

    public $belongsToMany = [
        'practices' => ['Samorai\Practice\Models\PracticeInfo', 'table' => 'samorai_practice_team'],
    ];

    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = ['name', 'position', 'experiences'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'samorai_team_members';
}