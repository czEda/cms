<?php
abstract class Kontroler
{

    protected $data = array();
    protected $pohled = "";
    protected $hlavicka = array('titulek' => '', 'klicova_slova' => '', 'popis' => '');


    public function vypisPohled()
    {
        if ($this->pohled) {
            extract($this->data);
            require("pohledy/" . $this->pohled . ".phtml");
        }
    }

    public function presmeruj($url)
    {
        header("Location: /$url");
        header("Connection: close");
        exit;
    }

    abstract function zpracuj($parametry);
}
