<?php

class voting
{
    public $votingid;
    public $vorlesungsid;
    public $votingname;
    public $frage;
    public $antwort_1;
    public $antwort_2;
    public $antwort_3;
    public $antwort_4;
    public $startdatum;
    public $enddatum;
    public $startzeit;
    public $endzeit;

    function __construct($data=null) {
        if (is_array($data)) {
            $this->votingid = $data['votingid'];
            $this->vorlesungsid = $data['vorlesungsid'];
            $this->votingname = $data['votingname'];
            $this->frage = $data['frage'];
            $this->antwort_1 = $data['antwort_1'];
            $this->antwort_2 = $data['antwort_2'];
            $this->antwort_3= $data['antwort_3'];
            $this->antwort_4 = $data['antwort_4'];
            $this->startdatum = $data['startdatum'];
            $this->enddatum = $data['enddatum'];
            $this->startzeit = $data['startzeit'];
            $this->endzeit = $data['endzeit'];
        }
    }
}