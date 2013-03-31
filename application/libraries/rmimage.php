<?php 
class CI_RmImage {

  function createThumbnail($path = false)
  {
      $CI =& get_instance();
      $CI->load->library('image_lib');

      $imageSize = $CI->image_lib->get_image_properties($path, TRUE);
      $config1['image_library'] = 'gd2';
      $config1['source_image'] = $path;
      $config1['create_thumb'] = TRUE;
      $config1['maintain_ratio'] = FALSE;
      $config1['height'] = 200*$imageSize['height']/$imageSize['width'];
      $config1['width'] = $config1['height']*$imageSize['width']/$imageSize['height'];
      $CI->image_lib->initialize($config1);
      $CI->image_lib->resize();
      $CI->image_lib->clear();
  }

  function encodeNameImage($path = false, $uploadData = false){
      $CI =& get_instance();
      $CI->load->library('userlib');

      $filename = $uploadData['file_name'];
      $filetype = $uploadData['image_type'];
      $unique_code = $CI->userlib->randString(4);
      $newname = md5($filename).$unique_code.".".$filetype; 
      if(file_exists($path.$filename)){
        rename($path.$filename,$path.$newname);
      }
      
      return $newname;
  }
    
}