<?php

class auswertung
{

    public $frageID;
    public $antwortID;
    public $voting_id;

    function __construct($data = null)
    {
        if (is_array($data)) {
            $this->frageID = $data['frageID'];
            $this->antwortID = $data['antwortID'];
            $this->voting_id = $data['voting_id'];
        }
    }
    
}

?>