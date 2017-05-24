<?php

class SpravceClanku
{
    public function vratClanek($url)
    {
        return Db::dotazJeden('
            SELECT `clanky_id`, `titulek`, `obsah`, `url`, `popisek`, `klicova_slova`
            FROM `clanky`
            WHERE `url` = ?
            ', array($url));
    }

    public function vratClanky()
    {
        return Db::dotazVsechny('
            SELECT `clanky_id`, `titulek`, `url`, `popisek`,
            FROM `clanky`
            ORDER BY `clanky_id` DESC
        ');
    }
}