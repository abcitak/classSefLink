<?php

class SefLink
{
    public $strSef = '';

    public function Generetor($strSef)
    {
        $strSef = mb_strtolower($strSef,'UTF-8');
        $strSef = str_replace(
            ['ı','ş','ç','ü','ö','ğ'],
            ['i','s','c','u','o','g'],
            $strSef
        );
        $strSef = preg_replace('/[^a-z0-9]/','-',$strSef);
        $strSef = preg_replace('/-+/','-',$strSef);
        $strSef = trim($strSef,'-');
        
        return $strSef;
    }
}

$sefLink = new SefLink;
$str = 'herşey çok güzel olsada oğzaman güzeldır ya da güzel değildir şanki';
echo $sefLink->Generetor($str);


?>

