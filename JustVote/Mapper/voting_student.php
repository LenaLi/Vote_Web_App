<?php

class voting_student
{
    public $votingstudent_id;
    public $votingid;
    public $ergebnis_id

    function __construct($data=null) {
        if (is_array($data)) {
            $this->votingstudent_id = $data['votingstudent_id'];
            $this->votingid = $data['votingid'];
            $this->ergebnis_id = $data['ergebnis_id'];
        }
    }
}