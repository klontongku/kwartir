<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function showImage($src = false, $name_image = false, $config = array()){
      	// $CI =& get_instance();
      	if($src && $name_image){
          $full_path = $src.$name_image;
          if(file_exists($full_path)){
            $config['src'] = $src.$name_image;
          }else{
            $config['src'] = 'images/error.jpg';
          }       		
      	}else{
      	 	$config['src'] = 'images/error.jpg';
      	}
        return img($config);
    }

    function showImageUrl($src = false, $name_image = false, $config = array()){
        // $CI =& get_instance();
        if($src && $name_image){
          $full_path = $src.$name_image;
          if(file_exists($full_path)){
            $config['src'] = $src.$name_image;
          }else{
            $config['src'] = 'images/error.jpg';
          }           
        }else{
          $config['src'] = 'images/error.jpg';
        }
        return $config['src'];
    }
    
    function imageProfile($user_data = array(), $config = array()){
      if($user_data['image']){
        if(file_exists(PROFILE.$user_data['image'])){
          $config['src'] = PROFILE.$user_data['image'];
        }else{
          $config['src'] = genderImage($user_data['gender']);
        }       		
      }else{
        $config['src'] = genderImage($user_data['gender']);
      }
      return img($config);
    }

    function genderImage($gender){
      $image = '';
      if($gender == 'female'){
        $image = PROFILE.'female.png';
      }else{
        $image = PROFILE.'male.png';
      }
      return $image;
    }