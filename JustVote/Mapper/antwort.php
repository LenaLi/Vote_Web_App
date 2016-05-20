<?php

class antwort {

    public $ID;
    public $frageID;
    public $text;

    function __construct($data=null) {
        if (is_array($data)) {
            $this->ID = $data['ID'];
            $this->frageID = $data['frageID'];
            $this->text = $data['text'];

        }
    }
}
?>