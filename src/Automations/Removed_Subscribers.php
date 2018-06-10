<?php

namespace Mailchimp_API\Automations;

use Mailchimp_API\Automations;

class Removed_Subscribers extends Automations
{
    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'email_address'
    ];

    function __construct($apikey, $class_input = null)
    {
        parent::__construct($apikey, $class_input);  
        $this->url .= '/removed-subscribers/';

    }


}