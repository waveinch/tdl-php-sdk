<?php

namespace TDL\Model;

class Calendar {
    public $id;
    public $name;

    function __construct($id,$name) {
        $this->id = $id;
        $this->name = $name;
    }
}

?>