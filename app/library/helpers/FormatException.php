<?php

namespace app\library\helpers;

class FormatException
{
    public static function throw($throw)
    {
        return ("
            <p>Erro</p>
            <p><b>Arquivo....:</b> {$throw->getFile()}</p>
            <p><b>Linha......:</b> {$throw->getLine()}</p>
            <p><b>Mensagem...:</b> <i>{$throw->getMessage()}</i></p>
        ");
    }
}