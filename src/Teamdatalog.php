<?php

namespace TDL;

use TDL\Model\Calendar;
use TDL\Model\EventTypes;

/**
 * Teamdatalog (TDL) access API
 * 
 * @version 0.1
 * @author Andrea Minetti, wavein.ch LLC
 * @copyright 2017 wavein.ch LLC
 */
class Teamdatalog {

    private $username;
    private $security_key;
    private $endpoint;

    private $enabled_calendars = array();

    /**
	 * @param string tdl username
	 * @param string tdl securityKey
     * @param string tdl API endpoint
     */
    function __construct($username,$security_key,$endpoint) {
        $this->username = $username;
        $this->security_key = $security_key;
        $this->endpoint = $endpoint;
    }

    public function list_calendars() {
        $result = array_map(function ($c) {
            return new Calendar($c->_id,$c->name);
        },$this->get("/team"));
        return $result;
    }
    public function list_event_types() {
        $result = array_map(function ($c) {
            return new EventTypes($c->_id,$c->name);
        },$this->get("/form"));
        return $result;
    }

    public function get_events_from($date,$events_type_id,$calendars_id) {
        return $this->get("/formData?end=2534783178272&formsId=".$events_type_id."&start=". ($date->getTimestamp()*1000)."&teamId=".$calendars_id);
    }


    private function get($path) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->endpoint.$path);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Auth-Password: '.$this->security_key,
            'Auth-Username: '.$this->username
        ));
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
}

?>