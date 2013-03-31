<?php 
class CI_Common {

    public function setFlash($message = false, $type_notif = false)
    {
    	  $CI =& get_instance();
		    $CI->load->library('session');
    	  return $this->session->set_flashdata($type_notif, $message);
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

    function sendEmail($from = false, $to = false, $name = false ,$subject = false, $templatemail = false, $data = array()){
      
      $CI =& get_instance();
      
      $config = Array(
          'protocol' => 'smtp',
          'mailtype' => 'html',
          'charset' => 'utf-8',
          'smtp_host' => SMTP_MAIL,
          'smtp_port' => SMTP_PORT_MAIL,
          'smtp_user' => SUPPORT_MAIL,
          'smtp_pass' => SUPPORT_MAIL_PASS,
      );

      
      $CI->load->library('email', $config);
      $CI->email->initialize($config);
      
      $CI->email->clear();

      $CI->email->from($from, $name);
      if($to == 'admin'){
        $to = array('muhammad.iksan3107@gmail.com', 'vendera.hadi@gmail.com');
      }
      $CI->email->to($to);
      $CI->email->subject($subject);
      $data_email = array(
        'content_for_layout' => $templatemail,
        'data_content' => $data
      );
      $CI->email->message($CI->load->view('layouts/default_email_html', $data_email, TRUE));
      // $CI->email->set_alt_message($CI->load->view('elements/emails/text/'.$templatemail, $data, TRUE));
      $CI->email->set_newline("\r\n");

      if($CI->email->send()){
        return true;
      }else{
        return false;
      }
    }

    function configPagination($path, $total_rows, $perpage, $uri_segment = 3){
      $config =  array(
          'base_url' => $path,
          'total_rows' => $total_rows,
          'per_page' => $perpage,    

          // 'use_page_numbers' => true,      
                    
          'next_link' => '>',
          'next_tag_open' => '<span>',
          'next_tag_close' => '</span>',

          'prev_link' => '<',
          'prev_tag_open' => '<span>',
          'prev_tag_close' => '</span>',

          // 'last_link' => 'Last',
          // 'last_tag_open' => '<span>',
          // 'last_tag_close' => '</span>',

          // 'first_link' => 'First',
          // 'first_tag_open' => '<span>',
          // 'first_tag_close' => '</span>',

          'uri_segment' => $uri_segment
      ); 

      return $config;
    }

    public function randNumber($length = '')
    {
      $charset='0123456789';
        $str = '';
        $count = strlen($charset);
        while ($length--) {
            $str .= $charset[mt_rand(0, $count-1)];
        }
        return $str;
    }

    function configValidation($register){
      switch ($register) {
        case 'user':
          $config = array(
                  array(
                        'field'   => 'name', 
                        'label'   => 'Nama', 
                        'rules'   => 'required'
                     ),
                  array(
                        'field'   => 'hometown', 
                        'label'   => 'Tempat Tanggal Lahir', 
                        'rules'   => 'required'
                     ),
                  array(
                     'field'   => 'birthday', 
                     'label'   => 'Tempat Tanggal Lahir', 
                     'rules'   => 'trim|required|valid_date[y-m-d,-]'
                  ), 
                  array(
                     'field'   => 'phone', 
                     'label'   => 'Telepon', 
                     'rules'   => 'required|numeric'
                  ),
                  array(
                     'field'   => 'gender', 
                     'label'   => 'Jenis kelamin', 
                     'rules'   => 'required'
                  ),
                  array(
                     'field'   => 'blood_type', 
                     'label'   => 'Golongan Darah', 
                     'rules'   => 'required'
                  ),
                  array(
                     'field'   => 'religius', 
                     'label'   => 'Agama', 
                     'rules'   => 'required'
                  ),
                  array(
                     'field'   => 'address', 
                     'label'   => 'Alamat', 
                     'rules'   => 'required'
                  ),
                  array(
                     'field'   => 'gugus_depan', 
                     'label'   => 'Gugus Depan', 
                     'rules'   => 'required|numeric|max_length[2]'
                  ),
                  array(
                     'field'   => 'kwartir_ranting', 
                     'label'   => 'Kwartir Ranting', 
                     'rules'   => 'required|numeric|max_length[2]'
                  ),
               );
        break;
        case 'login':
          $config = array(
            array(
                  'field'   => 'email', 
                  'label'   => 'username', 
                  'rules'   => 'required|valid_email'
               ),
            array(
                  'field'   => 'password', 
                  'label'   => 'password', 
                  'rules'   => 'required'
               ),
          );
        break;
        case 'contact':
          $config = array(
              array(
                  'field'   => 'name', 
                  'label'   => 'Nama', 
                  'rules'   => 'required'
              ),
              array(
                  'field'   => 'email', 
                  'label'   => 'Email', 
                  'rules'   => 'required|valid_email'
              ),
              array(
                'field'   => 'message', 
                'label'   => 'Pesan', 
                'rules'   => 'required'
              ),
              array(
                 'field'   => 'captcha', 
                 'label'   => 'captcha', 
                 'rules'   => 'required'
              ),
          );
        break;
      }

      return $config;
    }
}