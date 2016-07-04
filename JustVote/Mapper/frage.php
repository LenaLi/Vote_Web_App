<?php

class frage
{

    public $ID;
    public $voting_id;
    public $text;

    function __construct($data = null)
    {
        if (is_array($data)) {
            $this->ID = $data['ID'];
            $this->voting_id = $data['voting_id'];
            $this->text = $data['text'];

        }
    }
}

?>