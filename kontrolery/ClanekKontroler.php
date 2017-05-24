<?php

class ClanekKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        $spravceClanku = new SpravceClanku();

        $clanek = $spravceClanku->vratClanek($parametry[0]);
        if(!$clanek)
            $this->presmeruj('chyba');

        $this->hlavicka = array(
            'titulek' => $clanek['titulek'],
            'klicova_slova' => $clanek['klicova_slova'],
            'popis' => $clanek['popis'],
        );

        $this->data['titulek'] = $clanek['titulek'];
        $this->data['obsah'] = $clanek['obsah'];

        $this->pohled = 'clanek';
    }
}