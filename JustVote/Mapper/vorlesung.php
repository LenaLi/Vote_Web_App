<?php

class vorlesung
{
    public $vorlesungsid; //nur Zahlen!!
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