<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

// KONSTAN
define('ADMIN_PAGINATION', 20);
define('USER_PAGINATION', 10);
define('GALLERY_PAGINATION', 6);
define('ACTIVITY_PAGINATION', 9);
define('EVENT_PAGINATION', 3);

//for name
define('SITE_NAME', 'kwartirbogor.com');
define('SITE_SELF', 'kwartirbogor');
define('SITE_DESCRIPTION', 'test lorem ipsum dolor sit amet');

//for PATH
define('ACTIVITY_PATH', 'images/views/activity');
define('GALLERY_PATH', 'images/views/galleries');
define('ABOUT_US_PATH', 'images/views/pages');
define('EVENT_PATH', 'images/views/events');
define('PROFILE_PATH', 'images/views/users/');

//for email
define('MARKETING_MAIL', 'marketing@klontongku.com');
define('SUPPORT_MAIL', 'muhammad.iksan3107@gmail.com');
// define('SUPPORT_MAIL', 'support@klontongku.com');
define('SUPPORT_MAIL_PASS', 'muhammadiksan46');
// define('SUPPORT_MAIL_PASS', 'starmas567899');
define('SMTP_MAIL', 'ssl://smtp.gmail.com');
define('SMTP_PORT_MAIL', '465');
define('SUPPORT_WORD', 'support');
define('MY_MAIL', 'muhammad.iksan3107@gmail.com');
/* End of file constants.php */
/* Location: ./application/config/constants.php */