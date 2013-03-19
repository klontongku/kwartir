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
          $link = anchor($uri, $nameCrumb);            
        }
        else{
          $link = '<span>'.$nameCrumb.'</span>';
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
    
/**
* Outputs an variable
*
* @return    string
*/
    function getCountCart(){
      $CI =& get_instance();
      $CI->load->helper('cookie');
      $break_cookie = explode('|', get_cookie('klontongcart'));

      $count_cart = 0;
      if(!empty($break_cookie[0])){
        $count_cart = count($break_cookie);
      }
      return $count_cart;
    }

    function getMenuHeader(){
      $CI =& get_instance();
      $CI->load->model('Product');

      $data = $CI->Product->select(array(
          'where' => array(
            'category_products.active_category' => 1
          )
        ), 
      'category_products');
      return $data;
    }

    function getStatusTransaction($stat = false){
      $status = '';
      switch ($stat) {
        case 0: echo "invoice belum di approve"; break;
        case 1: echo "invoice ter-approve"; break;
        case 2: echo "sudah bayar"; break;
        case 3: echo "sudah terkirim, transaksi selesai"; break;
        case 4: echo "invoice di cancel"; break;
      }
      return $status;
    }