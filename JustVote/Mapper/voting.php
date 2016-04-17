<?php

class voting
{
    public $vorlesungsid;
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