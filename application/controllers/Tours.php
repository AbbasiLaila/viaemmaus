<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tours extends CI_Controller {

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

  
/*Tours*/
public function index()
	{
		$this->data['tours']=$this->main_model->get_all_data('tours');
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/tours/index',$this->data);
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
			   $data['thumbnail']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
				$this->session->set_flashdata('tourAdded', '');

     			}

			}
			else{
			   $this->data['required']="Tour thumbnail is required";
			}
			
			if($this->data['upload_response'] == "" && $this->data['required']==""){

    			$return=$this->main_model->insertData("tours",$data); 
    			$this->session->set_flashdata('tourAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Album added successfully.</div>'); 
				redirect('admin/tour/'.$return);
    		}
    			
	

}
}
	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/tours/add',$this->data);
	$this->load->view('admin/include/footer');


}

  	public function edit($id)
	{if($this->main_model->check($id, "tours")==false){

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
			   $data['thumbnail']=$this->upload_image('image'); 

			}else{
			    $this->data['upload_response'] =  $this->upload->display_errors();
				$this->session->set_flashdata('tourEdited', '');

     			}

			}
			
			
			if($this->data['upload_response'] == ""){

			$this->main_model->updateData($id,"tours",$data); 
    			$this->session->set_flashdata('tourEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Tour edited successfully.</div>'); 
				redirect('admin/tour/'.$id);
    		}
    			
	

}
}
		$this->data['tour']=$this->main_model->getItem('tours',$id);

	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/tours/edit',$this->data);
	$this->load->view('admin/include/footer');
}

}
/*View Tour*/
public function view($id)
	{
		if($this->main_model->check($id, "tours")==false){

			show_404();

		}
		else{
		
		
		$this->data['tour']=$this->main_model->getItem('tours',$id);
		$this->data['tourDays']=$this->main_model->getTourDays($id);
		$this->data['tourImages']=$this->main_model->getTourImages($id);
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/tours/view',$this->data);
		$this->load->view('admin/include/footer');
	}
}

public function add_day($id)
	{
		if($this->main_model->check($id, "tours")==false){

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
    			
				$data = array(
				'en_title'=>$this->input->post('en_title'),
				'sp_title'=>$this->input->post('sp_title'),
				'en_description'=>$this->input->post('en_description'),
				'sp_description'=>$this->input->post('sp_description'),
				'tour_id'=>$id
		 		); //form data array
		 		$return=$this->main_model->insertData("tour_days",$data); 

		 		$upload_responseimages = $this->upload_images('image');
				if(!empty($upload_responseimages)){

				$i=0;
				foreach($upload_responseimages['upload_data'] as $row){//get the image name 

					$img[$i]=$row['file_name'];					

				    $images_array[$i]=$img[$i];

					$i++;
	 
			 }	}
			 if(!empty($images_array)){
				foreach($images_array as $item){

				   $img_name=$item;

				   $image_row=array('day_id'=>$return,'image'=>$img_name);

			       $this->main_model->insertData('day_images',$image_row);		

			}}

			 $upload_responsevideos = $this->upload_videos('video');
				if(!empty($upload_responsevideos)){

				$i=0;
				foreach($upload_responsevideos['upload_data'] as $row){//get the image name 

					$video[$i]=$row['file_name'];					

				    $videos_array[$i]=$video[$i];

					$i++;
	 
			 }	}
			 if(!empty($videos_array)){
				foreach($videos_array as $item){

				   $video_name=$item;

				   $video_row=array('day_id'=>$return,'video'=>$video_name);

			       $this->main_model->insertData('day_videos',$video_row);		

			}}

		 	

    			$this->session->set_flashdata('dayAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Day added successfully.</div>'); 
				redirect('admin/tour/'.$id);
    		}
    			
	

}
}

	$this->data['tour_id']=$id;
	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/tours/program/add',$this->data);
	$this->load->view('admin/include/footer');


}

public function edit_day($id)
	{		
			if($this->main_model->check($id, "tour_days")==false){
			show_404();
		}
		else{

 			$images_array=array();
 			$upload_response=array();

		if($_POST){	 //If the form is posted-> validate data
			// Validation Check
			 	  $rules = $this->validation_model->title;      
				 $this->form_validation->set_rules($rules);			

    		if($this->form_validation->run() == false) //If Form validation errors exist
    			{
					$this->data['errors']= $this->form_validation->error_array();
			    		    $this->session->set_flashdata('dayEdited', ''); 
				}
    		else //form input is valid, NO errors
    		{
    			$this->data['upload_response']="";
				$data = array(
				'en_title'=>$this->input->post('en_title'),
				'sp_title'=>$this->input->post('sp_title'),
				'en_description'=>$this->input->post('en_description'),
				'sp_description'=>$this->input->post('sp_description'),
		 		); //form data array
		 
		 	
			$this->main_model->updateData($id,"tour_days",$data); //submit to database
			
		$upload_response = $this->upload_images('image');
			 if (!empty($upload_response)) {

			$i=0;
				foreach($upload_response['upload_data'] as $row){//get the image name 

					$img[$i]=$row['file_name'];					

				    $images_array[$i]=$img[$i];

					$i++;
	 
	 }	
		foreach($images_array as $item){

				   $img_name=$item;

				   $image_row=array('day_id'=>$id,'image'=>$img_name);

			       $this->main_model->insertData('day_images',$image_row);		
			   }
	}

	$upload_responsevideos = $this->upload_videos('video');
				if(!empty($upload_responsevideos)){

				$i=0;
				foreach($upload_responsevideos['upload_data'] as $row){//get the image name 

					$video[$i]=$row['file_name'];					

				    $videos_array[$i]=$video[$i];

					$i++;
	 
			 }	}
			 if(!empty($videos_array)){
				foreach($videos_array as $item){

				   $video_name=$item;

				   $video_row=array('day_id'=>$id,'video'=>$video_name);

			       $this->main_model->insertData('day_videos',$video_row);		

			}}

	    $this->session->set_flashdata('dayEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Day edited successfully.</div>'); 

	}


}

		$this->data['day']=$this->main_model->getItem('tour_days',$id); 
		$this->data['images']=$this->main_model->getDayImages($id);
		$this->data['videos']=$this->main_model->getDayVideos($id);

		$this->load->view('admin/include/head', $this->data);
		$this->load->view('admin/tours/program/edit',$this->data);
		$this->load->view('admin/include/footer');
	

}

}
  

public function add_image($id)
	{
		if($this->main_model->check($id, "tours")==false){

			show_404();

		}
		else{
		
		if($_POST){	
			 
    			$this->data['upload_response']="";
				$data = array(
				'en_title'=>$this->input->post('en_title'),
				'sp_title'=>$this->input->post('sp_title'),
				'en_description'=>$this->input->post('en_description'),
				'sp_description'=>$this->input->post('sp_description'),
				'tour_id'=>$id,
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

    			$return=$this->main_model->insertData("tour_images",$data); 
    			$this->session->set_flashdata('imageAdded', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Image added successfully.</div>'); 
				redirect('admin/tour/'.$id);
    		}
    			
	


}	$this->data['tour_id']=$id;

	$this->load->view('admin/include/head',$this->data);
	$this->load->view('admin/tours/gallery/add',$this->data);
	$this->load->view('admin/include/footer');


}

}
public function edit_image($id)
	{		
	if($this->main_model->check($id, "tour_images")==false){

			show_404();

		}
		else{
		if($_POST){	 
			
    			$this->data['upload_response']="";
				$data = array(
				'en_title'=>$this->input->post('en_title'),
				'sp_title'=>$this->input->post('sp_title'),
				'en_description'=>$this->input->post('en_description'),
				'sp_description'=>$this->input->post('sp_description'),

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
					 	
			$return=$this->main_model->updateData($id,"tour_images",$data); //submit to database
			$this->session->set_flashdata('imageEdited', '<div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Image edited successfully</div>'); 
		}
	}
	




		$this->data['image']=$this->main_model->getItem('tour_images',$id); 
		$this->load->view('admin/include/head',$this->data);
		$this->load->view('admin/tours/gallery/edit',$this->data);
		$this->load->view('admin/include/footer');
	}
}


	public function delete($id)
	{
		if($this->main_model->check($id, "tours")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('tours',$id);
		}
	}





	public function delete_img($id)
	{
		if($this->main_model->check($id, "tour_images")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('tour_images',$id);
		}
	}

	public function delete_day($id)
	{
		if($this->main_model->check($id, "tour_days")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('tour_days',$id);
		}
	}
	public function deleteAllDayImages($id)
	{
		
			$this->main_model->deletedayImages($id);
	}
public function deleteAllDayVideos($id)
	{
		
			$this->main_model->deletedayVideos($id);
	}
	public function delete_dayimg($id)
	{
		if($this->main_model->check($id, "day_images")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('day_images',$id);
		}
	}
public function delete_dayvideo($id)
	{
		if($this->main_model->check($id, "day_videos")==false){

			show_404();

		}
		else{
		
			$this->main_model->deleteData('day_videos',$id);
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


function upload_images($image){

	    $data=array();

	  	//upload function 		

	    $config['upload_path'] = './uploads/';

		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$config['max_size']	= '30000';

		$config['encrypt_name'] = TRUE;

		$config['overwrite'] = FALSE;

		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

	    $this->upload->initialize($config);	

	   if($this->upload->do_multi_upload($image)) {//if successful

          $imagdata=$this->upload->get_multi_upload_data();

		  $upload_details = $this->upload->get_multi_upload_data();

		  $data = array('success' => true, 'upload_data' => $upload_details, 'msg' => "Upload success!");

		 }
	return $data;	 

}///end upload function


function upload_videos($video){

	    $data=array();

	  	//upload function 		

	    $config['upload_path'] = './uploads/';

    $config['allowed_types'] = 'mp4|3gp|flv|mp3|mov';

		$config['max_size']	= '30000';

		$config['encrypt_name'] = TRUE;

		$config['overwrite'] = FALSE;

		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);

	    $this->upload->initialize($config);	

	   if($this->upload->do_multi_upload($video)) {//if successful

          $imagdata=$this->upload->get_multi_upload_data();

		  $upload_details = $this->upload->get_multi_upload_data();

		  $data = array('success' => true, 'upload_data' => $upload_details, 'msg' => "Upload success!");

		 }
	return $data;	 

}///end upload function




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