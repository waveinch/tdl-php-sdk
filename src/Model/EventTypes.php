<?php

namespace TDL\Model;

class EventTypes {
    private $id;
    private $name;

    function __construct($id,$name) {
        $this->id = $id;
        $this->name = $name;
    }
}

?>