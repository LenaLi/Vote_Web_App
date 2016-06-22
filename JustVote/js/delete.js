
    function checkdelete(){
        var conf = confirm("Daten wirklich löschen?");
        if (conf == true)
        {
            alert("Daten gelöscht!");
            return true;
        }
        else
        {
            alert("abbgebrochen!");
            return false;
        }
    }
