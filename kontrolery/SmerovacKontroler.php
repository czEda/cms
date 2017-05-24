<?php

class SmerovacKontroler extends Kontroler
{

    protected $kontroler;

    private function pomlckyDoVelbloudiNotace($text)
    {
        $veta = str_replace('-', ' ', $text);
        $veta = ucwords($veta);
        $veta = str_replace(' ', '', $veta);
        return $veta;
    }

    private function parsujURL($url)
    {
        $naparsovanaURL = parse_url($url);
        $naparsovanaURL["path"] = ltrim($naparsovanaURL["path"], "/");
        $naparsovanaURL["path"] = trim($naparsovanaURL["path"]);
        $rozdelenaCesta = explode("/", $naparsovanaURL["path"]);
        return $rozdelenaCesta;
    }

    public function zpracuj($parametry)
    {
        $naparsovanaURL = $this->parsujURL($parametry[0]);

        $tridaKontroleru = $this->pomlckyDoVelbloudiNotace(array_shift($naparsovanaURL)) . 'Kontroler';

        echo($tridaKontroleru);
        echo('<br />');
        print_r($naparsovanaURL);
    }
}