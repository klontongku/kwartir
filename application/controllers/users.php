<?php	
	class Users extends CI_Controller{
		public function __construct(){
	    	parent::__construct();
			$this->load->helper(array('common', 'image'));
			$this->load->model(array('User', 'Forgot'));
			$this->load->library(array('form_validation', 'userlib'));
	    }

	    // function index(){
	    // 	$this->activity();
	    // }

	    function register(){
         if($this->session->userdata('logged_in') == false){
            $config_validation = array_merge($this->common->configValidation('user'), array(array(
                     'field'   => 'captcha', 
                     'label'   => 'captcha', 
                     'rules'   => 'required'
                  )) 
            );

            $this->form_validation->set_rules($config_validation);
            $this->form_validation->set_message('required', 'field ini harus diisi');
            $this->form_validation->set_message('valid_email', 'format email tidak valid, contoh : "support@yahoo.com"');
            $this->form_validation->set_message('numeric', 'harus berupa angka');
            $this->form_validation->set_message('min_length', 'minimal 6 karakter');
            $this->form_validation->set_message('valid_date', 'format tanggal tidak valid, contoh : 2013-01-01');
            $this->form_validation->set_message('matches', 'konfirmasi password harus sama dengan passwword');
            $this->form_validation->set_message('is_unique', 'email ini telah terdaftar, coba dengan email lain');

            $this->form_validation->set_error_delimiters('<div class="alert_info">', '</div>');
            
            if($this->form_validation->run() == true){
              if(in_array($this->input->post('kwartir_ranting'), array(01,02,03,04,05,06))){
                if($this->session->userdata('captcha_code') == $this->input->post('captcha')){
                  $password = md5($this->input->post('password'));
                  $created = date('Y-m-d H:i:s');
                  $data_user = array(
                    'name' => $this->input->post('name'),
                    'password' => $password,
                    'hometown' => $this->input->post('hometown'),
                    'birthday' => $this->input->post('birthday'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),

                    'role_id' => 1,
                    'address' => $this->input->post('address'),
                    
                    'gender' => $this->input->post('gender'),
                    'blood_type' => $this->input->post('blood_type'),
                    'religius' => $this->input->post('religius'),
                    
                    'gugus_depan' => $this->input->post('gugus_depan'),
                    'kwartir_ranting' => $this->input->post('kwartir_ranting'),
                    
                    'activation_code' => $this->userlib->generate_activation_code($password),
                    'created' => $created,
                    'modified' => $created
                  );

                  if($this->User->insert($data_user) == true){
                    $this->session->set_flashdata('success', 'Berhasil melakukan registrasi, silahkan melakukan konfirmasi lewat email Anda.');
                    
                    if(!$this->common->sendEmail(SUPPORT_MAIL, $this->input->post('email'), SUPPORT_WORD, 'Konfirmasi Aktivasi Member', 'activation_member', $data_user)){
                       $this->session->set_flashdata('error', 'gagal mengirim email aktivasi, silahkan cek kembali alamat email anda atau segera hubungi customer service kami.');
                    }
                    redirect('users/login');
                  }else{
                    $this->session->set_flashdata('error', 'gagal melakukan registrasi, silahkan coba lagi'); 
                  }  
              }else{
                $this->session->set_flashdata('error', 'kwartir ranting 01 - 06, silahkan coba lagi');
              }  
             }else{
                $this->session->set_flashdata('error', 'kode captcha yang Anda masukan salah, coba lagi'); 
                $cap = $this->userlib->make_captcha();
                $this->session->set_userdata('captcha_code', $cap['word']);
             }
            }
            else{
               // $this->session->set_flashdata('error', 'gagal melakukan registrasi, silahkan coba lagi');
               $cap = $this->userlib->make_captcha();
               $this->session->set_userdata('captcha_code', $cap['word']);
            }
            $data = array(
    	    		'content_for_layout' => 'users/register',
    	    		'current_class' => 'register',
                    'captcha_code' => $cap,
                    'layout_css' => array(
                        'jquery-ui'
                    ),
                    'layout_js' => array(
                        'jquery-ui'
                    )
    	    	);
	    	$this->load->view('layouts/default', $data);
         }else{
            // $ci = new Common;
            redirect('users/profile/'.$this->session->userdata('id').'/'.$this->common->toSlug($this->session->userdata('full_name').'/'));
         }
		}

	    function login(){
	    	if(!$this->session->userdata('logged_in')){
	             $config_validation = $this->common->configValidation('login');
               $this->form_validation->set_rules($config_validation);
               $this->form_validation->set_message('required', 'field ini harus diisi');
               $this->form_validation->set_message('valid_email', 'format email tidak valid, contoh : "support@yahoo.com"');

               $this->form_validation->set_error_delimiters('<div class="alert_info_advance">', '</div>');
               if($this->form_validation->run() == true){
                  $user = array(
                     'where' => array(
                        'users.email' => $this->input->post('email'),
                        'users.password' => md5($this->input->post('password')),
                        'users.status_member' => 1,
                        'users.active_member' => 1,
                        'users.deleted_member' => 0
                     )
                  );
                  $data_user = $this->User->select($user);

                  if(!empty($data_user)){
                     $data_user = $data_user[0];
                     if($data_user['deleted_member']==1){
                        $this->session->set_flashdata('error', 'Anda belum mengaktivasi akun anda, cek email Anda untuk melakukan konfirmasi');
                        redirect('users/login');
                     }
                     else if($data_user['active_member']==0){
                        $this->session->set_flashdata('error', 'Anda belum mengaktivasi akun anda, cek email Anda untuk melakukan konfirmasi');
                        redirect('users/login');
                     }
                     else{

                     }
                     unset($data_user['password']);
                     unset($data_user['activation_code']);
                     // var_dump($data_user);die();
                     $data_user['full_name'] = $data_user['first_name'].' '.$data_user['last_name'];
                     $this->session->set_userdata('logged_in', true);
                     $this->session->set_userdata($data_user);
                     $this->session->set_flashdata('success', sprintf('selamat datang, %s %s', $data_user['first_name'], $data_user['last_name']));
                     redirect('pages/');
                  }else{
                     $this->session->set_flashdata('error', 'Email dan password tidak valid');
                  }
               }
            $data = array(
		    		'content_for_layout' => 'users/login',
		    	);
		    	$this->load->view('layouts/default', $data);
        }else{
          redirect('pages/');
        }
	    }

        function contact(){
            $config_validation = $this->common->configValidation('contact');;

            $this->form_validation->set_rules($config_validation);
            $this->form_validation->set_message('required', 'field ini harus diisi');
            $this->form_validation->set_message('valid_email', 'format email tidak valid, contoh : "support@yahoo.com"');

            $this->form_validation->set_error_delimiters('<div class="alert_info">', '</div>');
            if($this->form_validation->run() == true){
                if($this->session->userdata('captcha_code') == $this->input->post('captcha')){
                    $created = date('Y-m-d H:i:s');
                    $data_user = array(
                        'name' => $this->input->post('name'),
                        'subject' => $this->input->post('subject'),
                        'email' => $this->input->post('email'),
                        'message' => $this->input->post('message'),
                        'created' => $created,
                    );
                    if($this->DbContact->insert($data_user) == true){
                        $this->session->set_flashdata('success', 'Berhasil mengirim kontak');
                        $this->common->sendEmail($this->input->post('email'), SUPPORT_MAIL, $this->input->post('name'), $this->input->post('subject'), 'for_contact', $data_user);
                        redirect(current_url());
                    }else{
                        $this->session->set_flashdata('error', 'Gagal mengirim kontak');
                    }
                }else{
                  $this->session->set_flashdata('error', 'kode captcha yang Anda masukan salah, coba lagi'); 
                }
            }
        $cap = $this->userlib->make_captcha();
        $this->session->set_userdata('captcha_code', $cap['word']);
        $data['captcha_code'] = $cap;
        $data = array(
            'content_for_layout' => 'users/contact',
            'captcha_code' => $cap
        );
        $this->load->view('layouts/default', $data);
      }

      function member_activation($activation_code = false){
         if($activation_code){
            $cek_user = array(
               'where' => array(
                  // 'users.id' => $id,
                  'users.activation_code' => $activation_code,
                  'users.status' => 1,
                  'users.active' => 0
               )
            );
            $data_aktivasi = $this->User->select($cek_user);
            if(!empty($data_aktivasi)){
               $user = $data_aktivasi[0];
               if($user['active'] == 1){
                  $this->session->set_flashdata('error', 'Akun anda telah di aktivasi sebelumnya');
               }else{
                  $update_data = array(
                     'active' => 1,
                     'NIP' => $this->userlib->createNIP($user['kwartir_ranting'], $user['gugus_depan']),
                  );

                  $id = $user['id'];
                  if($this->User->update($id, $update_data)){
                     $this->session->set_flashdata('success', 'Akun Anda sudah berhasil diaktivasi');
                     $user = array(
                        'where' => array(
                           'users.id' => $id,
                           'users.status' => 1,
                           'users.active' => 1,
                        )
                     );
                     $data_user = $this->User->select($user);
                     $data_user = $data_user[0];
                     unset($data_user['password']);
                     unset($data_user['activation_code']);
                     // var_dump($data_user);die();
                     $data_user['full_name'] = $data_user['first_name'].' '.$data_user['last_name'];
                     $this->session->set_userdata('logged_in', true);
                     $this->session->set_userdata($data_user);
                     redirect(base_url());
                  }else{
                     $this->session->set_flashdata('error', 'Gagal melakukan aktivasi akun');
                  } 
               }
            }else{
               $this->session->set_flashdata('error', 'Kode aktivasi Anda salah');
            }
         }else{
            $this->session->set_flashdata('error', 'Kode aktivasi Anda salah');
         }
         redirect('users/login');
      }

      function forgot(){
        $config_validation = array(
              array(
                 'field'   => 'email', 
                 'label'   => 'Email', 
                 'rules'   => 'required|valid_email'
              ),
           );

        $this->form_validation->set_rules($config_validation);
        $this->form_validation->set_message('required', 'field ini harus diisi');
        $this->form_validation->set_message('valid_email', 'format email tidak valid, contoh : "support@yahoo.com"');

        $this->form_validation->set_error_delimiters('<div class="alert_info_advance">', '</div>');
        
        if($this->form_validation->run() == true){
           $user = $this->User->select(array(
              'where' => array(
                 'email' => $this->input->post('email')
              )
           ));

           if(empty($user)){
              $this->session->set_flashdata('error', 'maaf, email ini belum terdaftar');
           }else{
              $user = $user[0];
              $birthday = str_replace('-', '', date('Y-m-d', strtotime($user['birthday'])));
              $created = date('Y-m-d H:i:s');
              $data = array(
                 'new_password' => $birthday,
                 'code_activation' => $this->userlib->randString(31).$user['id'],
                 'user_id' => $user['id'],
                 'created_forgot' => $created,
              );  

              $cek_forgot = $this->Forgot->select(array(
                 'where' => array(
                    'user_id' => $user['id']
                 )
              ));

              if(empty($cek_forgot)){
                 if($this->Forgot->insert($data)){
                    if(!$this->common->sendEmail(SUPPORT_MAIL, $this->input->post('email'), SUPPORT_WORD, 'Konfirmasi Lupa Password', 'forgot_password', $data)){
                       $this->session->set_flashdata('error', 'Gagal mengirim email konfirmasi, pastikan koneksi internet anda cukup untuk melakukan akses');
                    }else{
                       $this->session->set_flashdata('success', 'berhasil melakukan reset password, silahkan melakukan konfirmasi pada email Anda');
                       redirect(current_url());
                    }
                 }else{
                    $this->session->set_flashdata('error', 'Gagal melakukan lupa password');
                 }
              }else{
                 $cek_forgot = $cek_forgot[0];
                 if($this->Forgot->update($cek_forgot['id_forgot'], $data)){
                    if(!$this->common->sendEmail(SUPPORT_MAIL, $this->input->post('email'), SUPPORT_WORD, 'Konfirmasi Lupa Password', 'forgot_password', $data)){
                       $this->session->set_flashdata('error', 'Gagal mengirim email konfirmasi, pastikan koneksi internet anda cukup untuk melakukan akses');
                    }else{
                       $this->session->set_flashdata('success', 'berhasil melakukan reset password, silahkan melakukan konfirmasi pada email Anda');
                       redirect(current_url());
                    }
                 }else{
                    $this->session->set_flashdata('error', 'Gagal melakukan lupa password');
                 }
              }
           }
        }
        $data = array(
            'content_for_layout' => 'users/forgot',
        );
        $this->load->view('layouts/default', $data);
      }

      function verify_reset_password($user_id = false, $code_activation = false){
      if($code_activation && $user_id){   
         $forgot = $this->Forgot->select(array(
               'where' => array(
                  'user_id' => $user_id,
                  'code_activation' => $code_activation,
               )
            ));
         $forgot= $forgot[0];
         
         if(!empty($forgot)){
            if($forgot['completed'] == 0){
               
               $update_data = array(
                  'completed' => 1
               );
               if($this->Forgot->update($forgot['id_forgot'], $update_data)){
                  $update_user = array(
                     'password' => md5($forgot['new_password'])
                  );
                  if($this->User->update($forgot['user_id'], $update_user)){
                     $this->session->set_flashdata('success', 'Berhasil mengaktivasi reset password, silahkan login dengan password baru anda.');
                     redirect('users/login');
                  }else{
                     $this->session->set_flashdata('error', 'Gagal mengaktivasi reset password');
                  }
               }else{
                  $this->session->set_flashdata('error', 'Gagal mengaktivasi reset password');
               }

            }else{
               $this->session->set_flashdata('error', 'aktivasi sudah di lakukan sebelumnya');
            }

         }else{
            $this->session->set_flashdata('error', 'code aktivasi anda tidak diketahui');
         }
      }else{
         $this->session->set_flashdata('error', 'code aktivasi anda tidak diketahui');
      }
      redirect(base_url());
   }
	}
?>