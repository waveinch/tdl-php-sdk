<?php

namespace TDL\Model;

class Calendar {
    private $id;
    private $name;

    function __construct($id,$name) {
        $this->id = $id;
        $this->name = $name;
    }
}

?>