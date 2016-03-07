<?php namespace Samorai\Team\Models;

use Model;

/**
 * Model
 */
class Language extends Model
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

    /**
     * @var string The database table used by the model.
     */
    public $table = 'samorai_team_languages';

    public $belongsTo = [
        'team_members' => 'Samorai\Team\Models\TeamMembers'
    ];

    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = ['language'];
}