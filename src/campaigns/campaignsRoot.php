<?php

class Campaigns extends Mailchimp
{

    public $subclass_resource;

    //SUBCLASS INTANTIATIONS
    public $checklist;
    public $feedback;
    public $content;

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if (isset($class_input)) {
            $this->url .= '/campaigns/' . $class_input;
        } else {
            $this->url .= '/campaigns/';
        }
        
        $this->subclass_resource = $class_input;

    }

    public function GET( $query_params = null )
    {
        $query_string = '';

        if (is_array($query_params)) {
            $query_string = $this->constructQueryParams($query_params);
        }

        $url = $this->url . $query_string;
        $response = $this->curlGet($url);

        return $response;
    }

    public function POST($type, $settings = array(), $optional_parameters = array())
    {

        $params = array('type' => $type, 'settings' => $settings);
        $params = array_merge($params, $optional_parameters);

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function PATCH($params = array())
    {

        $payload = json_encode($params);
        $url = $this->url;

        $response = $this->curlPatch($url, $payload);

        return $response;
    }

    public function DELETE()
    {
        $url = $this->url;
        $response = $this->curlDelete($url);

        return $response;
    }

    public function CANCEL()
    {
        $params = array();

        $payload = json_encode($params);
        $url = $this->url . '/actions/cancel-send/';

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function PAUSE()
    {
        $params = array();

        $payload = json_encode($params);
        $url = $this->url . '/actions/pause';

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function REPLICATE()
    {
        $params = array();

        $payload = json_encode($params);
        $url = $this->url . '/actions/replicate';

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function RESUME()
    {
        $params = array();

        $payload = json_encode($params);
        $url = $this->url . '/actions/resume';

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function SCHEDULE($schedule_time, $optional_parameters = array())
    {
        $params = array("schedule_time" => $schedule_time);
        $params = array_merge($params, $optional_parameters);

        $payload = json_encode($params);
        $url = $this->url . '/actions/schedule';

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function SEND()
    {
        $params = array();

        $payload = json_encode($params);
        $url = $this->url . '/actions/send';

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function TEST($test_addresses = array(), $send_type)
    {
        $params = array("test_emails" => $test_addresses, "send_type" => $send_type);

        $payload = json_encode($params);
        $url = $this->url . '/actions/test';

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function UNSCHEDULE()
    {
        $params = array();

        $payload = json_encode($params);
        $url = $this->url . '/actions/unschedule';

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function checklist()
    {
        $this->checklist = new Campaigns_Send_Checklist(
            $this->apikey,
            $this->subclass_resource
        );
        return $this->checklist;
    }

    public function feedback( $class_input = null )
    {
        $this->feedback = new Campaigns_Feedback(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->feedback;
    }

    public function content()
    {
        $this->content = new Campaigns_Content(
            $this->apikey,
            $this->subclass_resource
        );
        return $this->content;
    }
}