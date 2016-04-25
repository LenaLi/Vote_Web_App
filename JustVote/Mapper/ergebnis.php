<?php

class ergebnis
{
    public $ergebnisid;
    public $voting_id;
    public $ergebnis;

    function __construct($data = null)
    {
        if (is_array($data)) {
            $this->ergebnisid = $data['ergebnisid'];
            $this->voting_id = $data['voting_id'];
            $this->ergebnis = $data['ergebnis'];

        }
    }
}
