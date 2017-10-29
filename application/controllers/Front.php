<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class front extends MY_Controller {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jerusalem');
       
    }
    public function index() {
		
		$this->load->view('front/include/head',$this->data);
		$this->load->view('front/index',$this->data);
		$this->load->view('front/include/footer',$this->data);
    }
    public function show_404() {
        
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/404',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }
   
    function language($lang = false)
    {
        $lang = $this->uri->segment(2);
        $folder = 'application/language/';
        $languagefiles = scandir($folder);
        if (in_array($lang, $languagefiles)) {
            $cookie = array('name' => 'language', 'value' => $lang, 'expire' => '31536000',
                'prefix' => 'site_', 'secure' => false);
            $this->input->set_cookie($cookie);
        }
        redirect($_SERVER["HTTP_REFERER"]);
    }

}