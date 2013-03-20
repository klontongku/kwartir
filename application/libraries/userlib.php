<?php 
class CI_Userlib {
	
	/**
	 * @access	public
	 * @return	string
	 */

    public function randString($length = '')
	{
		$charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	    $str = '';
	    $count = strlen($charset);
	    while ($length--) {
	        $str .= $charset[mt_rand(0, $count-1)];
	    }
	    return $str;
	}

	/**
	 * @access	public
	 * @param string
	 * @return	string
	 */

    public function generate_activation_code($pass)
    {
    	$break_string = str_split($pass);
    	$pass_string = '';
		for ($i=0; $i < 10; $i++) { 
    		$pass_string .= $break_string[$i];    		
    	}

    	$rand_string = $this->randString(20);    	
    	$code_generator = $rand_string.$pass_string;
    	return $code_generator;
    	// return $pass_string;
    }

    function make_captcha(){
	 	$CI =& get_instance();
		$CI->load->helper('captcha');
		  $vals = array(
			  'img_path' => './images/captcha/',
			  'img_url' => base_url().'/images/captcha/',
			  // 'font_path' => './font/font.woff',
			  'img_width' => 355,
			  'img_height' => 60,
			  'expiration' => 60
		  );
		  $cap = create_captcha($vals);
		  return $cap;
	}

	function createNIP($kwartir_ranting, $gugus_depan){
		$CI =& get_instance();
		$CI->load->model('User');

		$default_number = '0917';
		$last_id = $CI->User->select(array(
			'where' => array(
				'users.status' => 1,
				'users.active' => 1,
			),	
			'field' => array(
				'users.NIP',
			),
			'order' => array(
				'users.id'
			),
			'limit' => array(1)
		));
		if(empty($last_id)){
			$NIP = sprintf('%s-%s-%s', $default_number, $kwartir_ranting.$gugus_depan, date('y').'0001');
		}else{
			$last_id = $last_id[0];
			$for_NIP = explode('-', $last_id['NIP']);
			$potong_kd = substr($for_NIP[2], 2, 4);
			$konversi_kd = (int)$potong_kd;
			$for_NIP = $konversi_kd + 1;
			$for_NIP = str_pad($for_NIP, 4, '0', STR_PAD_LEFT);
			$NIP = sprintf('%s-%s-%s', $default_number, $kwartir_ranting.$gugus_depan, date('y').$for_NIP);
		}

		return $NIP;
	}
}