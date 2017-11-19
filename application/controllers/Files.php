<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class files extends CI_Controller {

public function __construct()

  	 {

		parent::__construct();
		date_default_timezone_set("Asia/Jerusalem");
		$this->load->library('ion_auth');
        $this->data['pages']      = $this->main_model->get_all_data('pages');


    //if not admin redirect to login form.

	 if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())

        {

            redirect('auth', 'refresh');

        

		}


   }

	public function index()
	{			

		$this->data['files']=$this->main_model->get_all_data('files');
		$this->load->view('admin/include/head', $this->data);
		$this->load->view('admin/files/index',$this->data);
		$this->load->view('admin/include/footer');
	}

	
public function delete($id)
	{
		if($this->main_model->check($id, "files")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('files',$id);
		}
	}

public function add()
	{
			if($_POST){	 //If the form is posted-> validate data
			// Validation Check
			
				$data = array(
				'name'=>$this->input->post('name'),

		 		); //form data array
		 	
				$this->data['upload_response']="";
    			$this->data['req']="";
				
				if($_FILES['file']['name'] !=""){
		 		 if($this->upload_file('file'))
			{
			   $data['link']=$this->upload_file('file'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
				$this->session->set_flashdata('fileAdded', ''); 

     			}

			}
			else{
			$this->data['req'] = "file is requiered";

			}
			if($this->data['upload_response'] == "" && $this->data['req']==""){

    			$return=$this->main_model->insertData("files",$data); //insert Data to database
    			$this->session->set_flashdata('filesAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                File has been uploaded successfully</div');
				redirect('admin/files');
    		}
    			
	}
	




		
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/files/add');
		$this->load->view('admin/include/footer');
	


}

function upload_file($form_field_name)
{
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'pdf|doc|docx|png|jpg';
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
}