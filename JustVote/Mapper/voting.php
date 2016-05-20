<?php

class voting
{
    public $votingid;
    public $vorlesungsid;
    public $votingname;
    public $startdatum;
    public $enddatum;
    public $startzeit;
    public $endzeit;

    function __construct($data=null) {
        if (is_array($data)) {
            $this->votingid = $data['votingid'];
            $this->vorlesungsid = $data['vorlesungsid'];
            $this->votingname = $data['votingname'];
            $this->startdatum = $data['startdatum'];
            $this->enddatum = $data['enddatum'];
            $this->startzeit = $data['startzeit'];
            $this->endzeit = $data['endzeit'];
        }
    }
}