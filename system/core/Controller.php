<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		
		log_message('debug', "Controller Class Initialized");
	}

	public static function &get_instance()
	{
		return self::$instance;
	}
	public function url($str){
        $str= preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/","a",$str);
	    $str= preg_replace("/(B)/","b",$str);
	    $str= preg_replace("/(C)/","c",$str);
	    $str= preg_replace("/(đ|D|Đ)/","d",$str);
	    $str= preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/","e",$str);
	    $str= preg_replace("/(F)/","f",$str);
	    $str= preg_replace("/(G)/","g",$str);
	    $str= preg_replace("/(H)/","h",$str);
	    $str= preg_replace("/(ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ)/","i",$str);
	    $str= preg_replace("/(J)/","j",$str);
	    $str= preg_replace("/(K)/","k",$str);
	   	$str= preg_replace("/(L)/","l",$str);
	    $str= preg_replace("/(M)/","m",$str);
	    $str= preg_replace("/(N)/","n",$str);
	   	$str= preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/","o",$str);
	    $str= preg_replace("/(P)/","p",$str);
	    $str= preg_replace("/(Q)/","q",$str);
	    $str= preg_replace("/(R)/","r",$str);
	    $str= preg_replace("/(S)/","s",$str);
	    $str= preg_replace("/(T)/","t",$str);
	    $str= preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/","u",$str);
	    $str= preg_replace("/(V)/","v",$str);
	    $str= preg_replace("/(W)/","w",$str);
	    $str= preg_replace("/(X)/","x",$str);
	    $str= preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ)/","y",$str);
	    $str= preg_replace("/(Z)/","z",$str);
	    $str= preg_replace("/(!|@|%|\^|\*|\(|\)|\+|\=|<|>|\?|\/|,|\.|\:|\;|\'|\"|\“|\”|\&|\#|\[|\]|~|$|_)/","-",$str); 
	    $str = str_replace(" ", "-",str_replace("&*#39;","",$str));
	    return $str;
    }
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */