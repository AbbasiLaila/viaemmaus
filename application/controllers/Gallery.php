<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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

  
/*Gallery Photo Albums*/
public function index()
	{
		$this->data['albums']=$this->main_model->get_all_data('albums');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/gallery/albums/index',$this->data);
		$this->load->view('admin/include/footer');
	}

	public function add_album()
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
    			$this->data['required']="";
    			$this->data['upload_response']="";
				$data = array(
				'en_title'=>$this->input->post('en_title'),
				'sp_title'=>$this->input->post('sp_title'),
				'en_description'=>$this->input->post('en_description'),
				'sp_description'=>$this->input->post('sp_description'),
                'url' => $this->safeUrl($this->input->post('en_title')),
		 		); //form data array
		 	
			   if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
				$this->session->set_flashdata('albumAdded', '');

     			}

			}
			else{
			   $this->data['required']="Album thumbnail is required";
			}
			
			if($this->data['upload_response'] == "" && $this->data['required']==""){

    			$return=$this->main_model->insertData("albums",$data); 
    			$this->session->set_flashdata('albumAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Album added successfully.</div>'); 
				redirect('admin/gallery');
    		}
    			
	

}
}
	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/gallery/albums/add',$this->data);
	$this->load->view('admin/include/footer');


}

public function edit_album($id)
	{		
	if($this->main_model->check($id, "albums")==false){

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
				'en_title'=>$this->input->post('en_title'),
				'sp_title'=>$this->input->post('sp_title'),
				'en_description'=>$this->input->post('en_description'),
				'sp_description'=>$this->input->post('sp_description'),
                'url' => $this->safeUrl($this->input->post('en_title')),

			); //form data array

		 	if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
			$this->session->set_flashdata('albumEdited', ''); 

     			}

			}
			
			

			if($this->data['upload_response'] == ""){
					 	
			$return=$this->main_model->updateData($id,"albums",$data); //submit to database
			$this->session->set_flashdata('albumEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Album edited successfully.</div>'); 
		}
	}
	

}


		$this->data['album']=$this->main_model->getItem('albums',$id); 
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/gallery/albums/edit',$this->data);
		$this->load->view('admin/include/footer');
	}
}



	public function delete_album($id)
	{
		if($this->main_model->check($id, "albums")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('albums',$id);
		}
	}


/*Gallery Photo Images*/
public function images()
	{
		$this->data['images']=$this->main_model->get_all_data('album_images');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/gallery/images/index',$this->data);
		$this->load->view('admin/include/footer');
	}

	public function add_image()
	{
		if($_POST){	
			 
    			$this->data['upload_response']="";
				$data = array(
				'en_title'=>$this->input->post('en_title'),
				'sp_title'=>$this->input->post('sp_title'),
                'album_id' => $this->input->post('album_id'),
		 		); //form data array
		 	
			   if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
				$this->session->set_flashdata('imageAdded', '');

     			}

			}
			else{
			    $this->data['req']='Image is required'; 
			}
			
			if($this->data['upload_response'] == "" && $this->data['req']==""){

    			$return=$this->main_model->insertData("album_images",$data); 
    			$this->session->set_flashdata('imageAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Image has been added successfully.</div>'); 
				redirect('admin/gallery/images');
    		}
    			
	


}
	$this->data['albums']=$this->main_model->get_all_data('albums');
	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/gallery/images/add',$this->data);
	$this->load->view('admin/include/footer');


}

public function edit_image($id)
	{		
	if($this->main_model->check($id, "album_images")==false){

			show_404();

		}
		else{
		if($_POST){	 
			
    			$this->data['upload_response']="";
				$data = array(
				'en_title'=>$this->input->post('en_title'),
				'sp_title'=>$this->input->post('sp_title'),
                'album_id' => $this->input->post('album_id'),

			); //form data array

		 	if($_FILES['image']['name'] !=""){
		 		 if($this->upload_image('image'))
			{
			   $data['image']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
			$this->session->set_flashdata('imageEdited', ''); 

     			}

			}
			

			if($this->data['upload_response'] == ""){
					 	
			$return=$this->main_model->updateData($id,"album_images",$data); //submit to database
			$this->session->set_flashdata('imageEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Image has been edited successfully</div>'); 
		}
	}
	




		$this->data['image']=$this->main_model->getItem('album_images',$id); 
		$this->data['albums']=$this->main_model->get_all_data('albums');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/gallery/images/edit',$this->data);
		$this->load->view('admin/include/footer');
	}
}



	public function delete_image($id)
	{
		if($this->main_model->check($id, "album_images")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('album_images',$id);
		}
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

function upload_video($form_field_name) {

	$config['upload_path'] = './uploads/';

    $config['allowed_types'] = 'mp4|3gp|flv|mp3|mov';

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

	$vidname=$upload_data['file_name'];

	return $vidname;

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