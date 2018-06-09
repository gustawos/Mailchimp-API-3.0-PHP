<?php

namespace Mailchimp_API\Lists\Segments;

class Lists_Segment_Segment_Members extends Lists_Segments
{
    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'email_address'
    ];

    function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if (isset($class_input)) {
            $this->url .= '/members/' . $class_input;
        } else {
            $this->url .= '/members/';
        }

    }
}