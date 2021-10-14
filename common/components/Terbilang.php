<?php

namespace common\components;

use Yii;
use yii\helpers\Html;
use yii\base\Component;

class Terbilang extends Component{
    
    public function rupiah($uang)
  {
    $rp = $this->spellNumberInIndonesian($uang);
    echo ucfirst( $rp.' rupiah ' ) ;
    
  }
  /*
     sumber http://www.lesantoso.com/terbilang.html
  */
  public function spellNumberInIndonesian ($number) {
    $number = strval($number);
    //if (!ereg("^[0-9]{1,15}$", $number))   deprecated
       if (!preg_match("/^[0-9]{1,15}$/", $number))
        return(false);
    $ones = array("", "satu", "dua", "tiga", "empat",
        "lima", "enam", "tujuh", "delapan", "sembilan");
    $majorUnits = array("", "ribu", "juta", "milyar", "trilyun");
    $minorUnits = array("", "puluh", "ratus");
    $result = "";
    $isAnyMajorUnit = false;
    $length = strlen($number);
    for ($i = 0, $pos = $length - 1; $i < $length; $i++, $pos--) {
        if ($number{$i} != '0') {
            if ($number{$i} != '1')
                $result .= $ones[$number{$i}].' '.$minorUnits[$pos % 3].' ';
            else if ($pos % 3 == 1 && $number{$i + 1} != '0') {
                if ($number{$i + 1} == '1')
                    $result .= "sebelas ";
                else
                    $result .= $ones[$number{$i + 1}]." belas ";
                $i++; $pos--;
            } else if ($pos % 3 != 0)
                $result .= "se".$minorUnits[$pos % 3].' ';
            else if ($pos == 3 && !$isAnyMajorUnit)
                $result .= "se";
            else
                $result .= "satu ";
            $isAnyMajorUnit = true;
        }
        if ($pos % 3 == 0 && $isAnyMajorUnit) {
            $result .= $majorUnits[$pos / 3].' ';
            $isAnyMajorUnit = false;
        }
    }
    $result = trim($result);
    if ($result == "") $result = "nol";
    return($result);
   }
}
