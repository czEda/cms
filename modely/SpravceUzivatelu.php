<?php

class SpravceUzivatelu
{
    public function vratOtisk($heslo)
    {
        $sul = 'fd16sdfd2ew#$%';
        return hash('sha256', $heslo . $sul);
    }

    public function registruj($jmeno, $heslo, $hesloZnovu, $rok)
    {
        if ($rok != date('Y'))
            throw new ChybaUzivatele('Chybne vyplneny antispam.');
        if ($heslo != $hesloZnovu)
            throw new ChybaUzivatele('Hesla se neshoduji.');
        $uzivatel = array(
            'jmeno' => $jmeno,
            'heslo' => $this->vratOtisk($heslo)
        );
        try
        {
            Db::vloz('uzivatele', $uzivatel);
        }
        catch (PDOException $chyba)
        {
            throw new ChybaUzivatele('Uzivatel s timto jmenem je jiz zaregistrovany.');
        }
    }

    public function prihlas($jmeno, $heslo)
    {
        $uzivatel = Db::dotazJeden('
            SELECT uzivatele_id, jmeno, admin
            FROM uzivatele
            WHERE jmeno = ? AND heslo = ?
        ', array($jmeno, $this->vratOtisk($heslo)));
        if (!$uzivatel)
            throw new ChybaUzivatele('Neplatne jmeno nebo heslo.');
        $_SESSION['uzivatel'] = $uzivatel;
    }

    public function odhlas()
    {
        unset($_SESSION['$uzivatel']);
    }

    public function vratUzivatele()
    {
        if (isset($_SESSION['uzivatel']))
            return $_SESSION['uzivatel'];
        return null;
    }
}