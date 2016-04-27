<?php

class vorlesung
{
    public $vorlesungsid; // hier können nur Zahlen eingegeben werden!
    public $benutzerid;
    public $vorlesungsname;

    function __construct($data=null) {
        if (is_array($data)) {
            $this->vorlesungsid = $data['vorlesungsid'];
            $this->benutzerid = $data['benutzerid'];
            $this->vorlesungsname = $data['vorlesungsame'];
        }
    }
}