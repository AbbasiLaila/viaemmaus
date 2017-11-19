<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class services extends CI_Controller {

	public function __construct()
  	 {
		parent::__construct();
		$this->load->library('ion_auth');
    //if not admin redirect to login form.
	 if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        
		}
        $this->data['pages']      = $this->main_model->get_all_data('pages');

   }
	public function index()
	{
		$this->data['services']=$this->main_model->get_all_data('services');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/services/index',$this->data);
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		if($_POST){	
			  $rules = $this->validation_model->title;
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == false) //If Form validation errors exist
                    {
                    $this->data['errors'] = $this->form_validation->error_array();
                } else
                // form input is valid, NO errors
                    {
    			$this->data['upload_response']="";
				$data = array(
				'en_title' => $this->input->post('en_title'),
                'sp_title' => $this->input->post('sp_title'),
                'en_description' => $this->input->post('en_description'),
                'sp_description' => $this->input->post('sp_description'),
                'url' => $this->safeUrl($this->input->post('en_title'))
		 		); //form data array
		 	
			   if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
				$this->session->set_flashdata('serviceAdded', '');

     			}

			}
			
			
			if($this->data['upload_response'] == ""){

    			$return=$this->main_model->insertData("services",$data); 
    			$this->session->set_flashdata('servicesAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Service added successfully.</div>'); 
				redirect('admin/services');
    		}
    			
	

}
}
		
	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/services/add');
	$this->load->view('admin/include/footer');


}


	public function edit($id)
	{		
	if($this->main_model->check($id, "services")==false){

			show_404();

		}
		else{
		if($_POST){	 
			$rules = $this->validation_model->title;
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == false) //If Form validation errors exist
                    {
                    $this->data['errors'] = $this->form_validation->error_array();
                } else
                // form input is valid, NO errors
                    {
    			$this->data['upload_response']="";
				$data = array(
				'en_title' => $this->input->post('en_title'),
                'sp_title' => $this->input->post('sp_title'),
                'en_description' => $this->input->post('en_description'),
                'sp_description' => $this->input->post('sp_description'),
                'url' => $this->safeUrl($this->input->post('en_title'))

			); //form data array

		 	if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
			$this->session->set_flashdata('serviceEdited', ''); 

     			}

			}
			

			if($this->data['upload_response'] == ""){
					 	
			$return=$this->main_model->updateData($id,"services",$data); //submit to database
			$this->session->set_flashdata('serviceEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Service edited successfully</div>'); 
		}
	}
	

}


		$this->data['service']=$this->main_model->getItem('services',$id); 

		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/services/edit',$this->data);
		$this->load->view('admin/include/footer');
	}
}

public function delete($id)
	{
		if($this->main_model->check($id, "services")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('services',$id);
		}
	}


		public function highlights()

  {
	 	$services=$this->main_model->get_all_data('services');

	  	if($_POST){
	  	if($this->input->post('selectedc') !=""){

	$myArray = explode(',', $this->input->post('selectedc'));
	 foreach ($services as $service){
		 $data = array(
				'highlight'=>'0',
		 		); 
				$this->main_model->updateData($service['id'],"services",$data); //submit to database
		 
	 }

	 foreach ($myArray as $service){
   				$data = array(
				'highlight'=>'1',
		 		); //form data array
				$this->main_model->updateData($service,"services",$data); //submit to database
				$this->session->set_flashdata('highlightsEdited', 'Selected Services have been highlighted in the main page.');

}			
				}
				
				else{
				$this->session->set_flashdata('highlightsEdited', '');
				$this->data['req'] =  'Please select services to be highlighted in the main page.';

				}
		}
	  $this->data['services']=$this->main_model->get_all_data('services');
	  $this->data['req'] ="";
	  $this->data['highlights']=$this->main_model->get_highlights();
	 $output = array_map(function ($object) { return $object['id']; }, $this->data['highlights']);
	$this->data['carray'] = implode(',', $output);


    $this->load->view('admin/include/head',$this->data);

    $this->load->view('admin/highlights');

    $this->load->view('admin/include/footer');

  }

/*Upload images function*/
function upload_image($form_field_name)
{
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	$config['encrypt_name'] = TRUE;
	$config['overwrite'] = FALSE;
	$config['remove_spaces'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ( ! $this->upload->do_upload($form_field_name))
    {
    return false;
    }
    else
    {
    $data = array('upload_data' => $this->upload->data());
	$upload_data = $this->upload->data();	
	$imgname=$upload_data['file_name'];
	return $imgname;
    }
}

function SafeUrl($url)
    {
        
        
        $str         = $url;
        $friendlyURL = htmlentities($str, ENT_COMPAT, "UTF-8", false);
        
        $friendlyURL = trim(strtolower($str));
        
        $friendlyURL = preg_replace("/[^أ-يa-zA-Z0-9_.-]/u", "-", $friendlyURL);
        
        $friendlyURL = html_entity_decode($friendlyURL, ENT_COMPAT, "UTF-8");
        
        $friendlyURL = trim(preg_replace('/-+/', '-', $friendlyURL), '-');
        
        $friendlyURL = trim($friendlyURL, '-');
        
        $url = $friendlyURL . '.html';
        
        return $url;
        
    }
}