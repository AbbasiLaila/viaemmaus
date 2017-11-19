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

    public function about() {
        
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/about',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }

    public function services() {
        
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/services',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }

    public function service() {
        
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/service',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }

    public function itineraries() {
        
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/itineraries',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }

    public function tour() {
        
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/tour',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }

    public function gallery() {
        
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/gallery',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }

    public function album() {
        
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/album',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }

    public function rating() {
        
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/rating',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }

    public function contact() {
        
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/contact',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }

     public function privacy() {
        
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/privacy',$this->data);
        $this->load->view('front/include/footer',$this->data);
    }

     public function terms() {
        
        $this->load->view('front/include/head',$this->data);
        $this->load->view('front/terms',$this->data);
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