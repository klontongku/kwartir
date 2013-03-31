<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Outputs an array or variable
*
* @param    $var array, string, integer
* @return    string
*/
    function NumberingFormat($number = false, $type_notation = '.',  $decimal_point = 0)
    {
        if($number){
            $number_format = number_format($number,$decimal_point,$type_notation, $type_notation);
            return $number_format;  
        }else{
            return false;
        }
        
    }

    function addCrumb($nameCrumb = false, $status = false, $uri = 'javascript:void(0)'){
    	if($nameCrumb && $uri){
        if(!$status){
          $link = anchor($uri, $nameCrumb.'<span class="divider">/</span>');            
        }
        else{
          $link = anchor($uri, $nameCrumb);
        }
        return $link;
      }
    }
/**
* Outputs an array or variable
*
* @param    $var array, string, integer
* @return    string
*/
    function customDate($date = false, $format="d F Y"){ // default format date : "01 january 2012"
        $date = date_create($date);
        return date_format($date, $format);
    }

    function toSlug($text)
    { 
      // replace non letter or digits by -
      $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

      // trim
      $text = trim($text, '-');

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // lowercase
      $text = strtolower($text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      if (empty($text))
      {
        return 'n-a';
      }
      return $text;
    }

    function gugusDepan(){
        $gugusDepan =  array(
                            '' => '-Pilih-',
                            '00' => 'Mabiran',
                            '01' => 'Andalan Ranting',
                            '02' => 'Dewan Kerja Ranting',
                            '03' => 'Pembina/Mabigus',
                            '04' => 'Anggota',
                        );
        return $gugusDepan;
    }