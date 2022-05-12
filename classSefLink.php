<?php

class SefLink
{
    public $strSef = '';

    public function Generetor($strSef)
    {
        //türkçe karakterler için
        $strSef = mb_strtolower($strSef,'UTF-8');
        // türkçe karakterleri farklı harflerle değiştirmek için
        $strSef = str_replace(
            ['ı','ş','ç','ü','ö','ğ'],
            ['i','s','c','u','o','g'],
            $strSef
        );
        // harf ve sayıların arasında kalan boşlukları tire ile değiştirmek
        $strSef = preg_replace('/[^a-z0-9]/','-',$strSef);
        // özel işaretleri de tire ile değiştirmek için. mesela; ? * + gibi.
        $strSef = preg_replace('/-+/','-',$strSef);
        // sağda ve solda kalan boşluk veya özel işaret nedeni ile tireye dönüşen karakterleri silmek için
        $strSef = trim($strSef,'-');
        
        return $strSef;
    }
}

$sefLink = new SefLink;
$str = 'herşey çok güzel olsada oğzaman güzeldır ya da güzel değildir şanki ?';
echo $sefLink->Generetor($str);


?>

