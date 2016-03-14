<?php
/**
 * Created by PhpStorm.
 * User: Lamin Sanneh
 * Date: 5/19/14
 * Time: 12:55 AM
 */

namespace LaminSanneh\FlexiContact\components;


use Cms\Classes\ComponentBase;
use LaminSanneh\FlexiContact\Models\Settings;
use Mail;
use Mailgun\Mailgun;
use Validator;
use ValidationException;

class ContactForm extends ComponentBase{

    /**
     * Contact form validation rules.
     * @var array
     */
    public $formValidationRules = [
        'name' => ['required'],
        'email' => ['required', 'email'],
        'subject' => ['required'],
        'body' => ['required'],
    ];

    /**
     * Append custom validation messages. This is used to extend the component
     * with different locales.
     *
     * Example:
     * \Event::listen('cms.component.beforeRunAjaxHandler', function($handler) {
     *     if (get_class($handler) !== 'LaminSanneh\FlexiContact\components\ContactForm') return;
     *     $handler->customMessages = (array) Lang::get('mja.events::validation');
     * });
     *
     * @var array
     */
    public $customMessages = [];

    /**
     * Returns information about this component, including name and description.
     */
    public function componentDetails()
    {
        return [
            'name' => 'laminsanneh.flexicontact::lang.strings.component_name',
            'description' => 'laminsanneh.flexicontact::lang.strings.component_desc'
        ];
    }

    public function defineProperties(){

        return [
            'injectBootstrapAssets' => [
                'title'       => 'laminsanneh.flexicontact::lang.strings.inject_bootstrap',
                'description' => 'laminsanneh.flexicontact::lang.strings.inject_bootstrap_desc',
                'type'        => 'checkbox',
                'default'     => true,
            ],
            'injectMainScript' => [
                'title'       => 'laminsanneh.flexicontact::lang.strings.inject_main_script',
                'description' => 'laminsanneh.flexicontact::lang.strings.inject_main_script_desc',
                'type'        => 'checkbox',
                'default'     => true,
            ]
        ];
    }

    /**
     * AJAX handler called after the contact form has been submitted.
     *
     * @author Matiss Janis Aboltins <matiss@mja.lv>
     * @return array
     */
    public function onMailSent()
    {
        // Build the validator
        $validator = Validator::make(post(), $this->formValidationRules, $this->customMessages);

        // Validate
        if ($validator->fails()) {
            return ['error' => true];
        }
        $message = "Email: " . post('email') . "\nName: " . post('name') . "\nBody: " . post('body') ;

        ini_set('SMTP', 'smtp.gmail.com');
        ini_set('smtp_port', 465);

        //echo ;exit;

        $mgClient = new Mailgun('key-c486a80b21951933a7858e3737e38ced');
        $domain = "center-lex.com.ua";
        $answer = $mgClient->sendMessage($domain, array(
            'from'    => 'Center-lex <info@center-lex.com.ua>',
            'to'      => Settings::get('recipient_name') ." <".Settings::get('recipient_email').">",
            'subject' =>    Settings::get('subject'),
            'text'    => $message
        ));

//        // If everything is fine - send an email
//        $answer = Mail::send('laminsanneh.flexicontact::emails.message', post(), function($message)
//        {
//
//            $message->from(post('email'), post('name'))
//                ->to(Settings::get('recipient_email'), Settings::get('recipient_name'))
//                ->subject(Settings::get('subject'));
//        });

        $this->page["confirmation_text"] = Settings::get('confirmation_text');
        return ['error' => false, 'data' => $answer];


    }

    public function onRun(){

        if (!empty(post())) {
            $this->onMailSent();
        }

        if($this->property('injectBootstrapAssets') == true){
            $this->addCss('assets/css/bootstrap.css');
            $this->addJs('assets/js/bootstrap.js');
        }

        if($this->property('injectMainScript') == true) {
            $this->addJs('assets/js/main.js');
        }
    }
}
