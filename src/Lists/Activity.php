<?php

namespace Mailchimp_API\Lists;

use Mailchimp_API\Lists;

class Activity extends Lists
{
    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/activity/' . $class_input;
        } else {
            $this->url .= '/activity/';
        }

    }
}