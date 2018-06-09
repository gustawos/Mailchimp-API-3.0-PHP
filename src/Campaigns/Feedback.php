<?php

namespace Mailchimp_API\Campaigns;

use Mailchimp_API\Campaigns;

class Feedback extends Campaigns
{

    public $req_post_prarams = [
        'message'
    ];
    public $req_patch_params = [
        'message'
    ];

    function __construct($apikey, $parent_input, $class_input)
    {
        parent::__construct($apikey, $parent_input);
        if (isset($class_input)) {
            $this->url .= '/feedback/' . $class_input;
        } else {
            $this->url .= '/feedback/';
        }

    }
}