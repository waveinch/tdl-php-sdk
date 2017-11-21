<?php

namespace TDL\Model;

class EventTypes {
    public $id;
    public $name;

    function __construct($id,$name) {
        $this->id = $id;
        $this->name = $name;
    }
}

?>