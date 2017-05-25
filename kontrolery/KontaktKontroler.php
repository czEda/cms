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

        if ($_POST)
        {
            try
            {
                $odesilacEmailu = new OdesilacEmailu();
                $odesilacEmailu->odesliSAntispamem($_POST['rok'], "admin@adresa.cz", "Email z webu", $_POST['zprava'], $_POST['email']);
                $this->pridejZpravu('Email byl úspěšně odeslán.');
                $this->presmeruj('kontakt');
            }
            catch (ChybaUzivatele $chyba)
            {
                $this->pridejZpravu($chyba->getMessage());
            }
        }

        $this->pohled = 'kontakt';
    }
}