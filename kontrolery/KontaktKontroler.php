<?php

class KontaktKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        $this->hlavicka = array (
            'titulek' => 'Kontaktni formular',
            'klicova_slova' => 'kontakt, email, formular',
            'popis' => 'Kontaktni formular naseho webu.'
        );

        if (isset($_POST["email"]))
        {
            if ($_POST['rok'] == date("Y"))
            {
                $odesilacEmailu = new OdesilacEmailu();
                $odesilacEmailu->odesli("milsimer@gmail.com", "Email z webu", $_POST['zprava'], $_POST['email']);
            }
        }

        $this->pohled = 'kontakt';
    }
}