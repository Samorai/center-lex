<?php namespace Samorai\Practice\Models;

use Model;

/**
 * Model
 */
class PracticeInfo extends Model
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
    public $table = 'samorai_practice_info';

    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = ['name', 'text', 'small_text'];

    public $attachOne = [
        'image' => 'System\Models\File',
        'image_on_main' => 'System\Models\File'
    ];
}