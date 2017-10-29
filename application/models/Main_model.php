<?php

class main_model extends CI_Model  {

	

	

function insertData($table,$data){

		if($this->db->insert($table, $data)){

		    return $this->db->insert_id();

		}else{

		    return false;

		}

}//end function




function updateData($id,$table,$data){

	$this->db->where('id', $id);

	$this->db->update($table, $data);

}	//end function

function get_all_data($table){// for drop list 

	$sort='id';

    $order='DESC';


    $query=$this->db->select('*')

           ->from($table)

          ->order_by($sort, $order)

          ->get();

		return $query->result_array(); 	

}

function get_all_data_ordered($table , $sort, $order){

  
    $query=$this->db->select('*')

           ->from($table)

          ->order_by($sort, $order)

          ->get();

		return $query->result_array(); 	

}





function get_all_data_num($table){


    $query=$this->db->select('*')

           ->from($table)

          ->get();

        return $query->num_rows(); 

}


function getItem($table,$id){ 

		

		$query= $this->db->get_where($table, array('id' => $id));      

		return $query->row(); 	

}

function deleteData($table,$id)

{

		if ($id != NULL)

		{

				$this->db->where('id', $id);                    

				$this->db->delete($table);                        

		}

} 


function get_all_issues_pagination($category_id,$start,$sort,$limit){

  $sort=$sort;

    $order='DESC';


    $query=$this->db->select('*')

           ->from('main_issues')
           ->where('main_issues.category_id',$category_id)

          ->order_by($sort, $order)
      
          ->limit($limit,$start)

          ->get();

    return $query->result_array();  

}

function get_all_data_pagination($table,$start,$sort,$limit){

	$sort=$sort;

    $order='DESC';


    $query=$this->db->select('*')

           ->from($table)

          ->order_by($sort, $order)
		  
		  ->limit($limit,$start)

          ->get();

		return $query->result_array(); 	

}

function get_albums(){

    $query=$this->db->select('*')

                  ->from('photo_gallery')

                  ->where('type', 'album')

                  ->get();

    return $query->result_array();  

}
function getSubPages($id){

    $query=$this->db->select('*')

                  ->from('sub_pages')

                  ->where('page_id', $id)

                  ->get();

    return $query->result_array();  

}
function getAlbumImages($id){

    $query=$this->db->select('*')

                  ->from('album_images')

                  ->where('album_id', $id)

                  ->get();

    return $query->result_array();  

}

function getCategoryIssues($id){

    $query=$this->db->select('*')

                  ->from('main_issues')

                  ->where('category_id', $id)

                  ->get();

    return $query->result_array();  

}

function getGalleryImages($id){

		$query=$this->db->select('*')

                  ->from('news_images')

                  ->where('news_id', $id)

                  ->get();

		return $query->result_array(); 	

}

 function getAlbums(){
  $query = $this->db->select('*,photo_gallery.id as id,photo_gallery.url as url,photo_gallery.en_title as en_title, photo_gallery.ar_title as ar_title,gallery_categories.en_title as en_category, gallery_categories.ar_title as ar_category')
                  ->from('photo_gallery')
                  ->join('gallery_categories', 'gallery_categories.id = photo_gallery.category_id')
                  ->get();

return $query->result_array();
 }

 function getVideos(){
  $query = $this->db->select('*,videos.id as id,videos.en_title as en_title, videos.ar_title as ar_title,gallery_categories.en_title as en_category, gallery_categories.ar_title as ar_category')
                  ->from('videos')
                  ->join('gallery_categories', 'gallery_categories.id = videos.category_id')
                  ->get();

return $query->result_array();
 }

 function getAlbum($id){
  $query = $this->db->select('*,photo_gallery.id as id,photo_gallery.url as url,photo_gallery.en_title as en_title, photo_gallery.ar_title as ar_title,gallery_categories.en_title as en_category, gallery_categories.ar_title as ar_category')
                  ->from('photo_gallery')
                  ->where('photo_gallery.id', $id)
                  ->join('gallery_categories', 'gallery_categories.id = photo_gallery.category_id')
                  ->get();

return $query->row();
 }


function getJobs(){
 $date = new DateTime("now");

 $curr_date = $date->format('Y-m-d ');
    $query=$this->db->select('*')

           ->from('vacancies')
           ->where('vacancies.deadline >=', $curr_date)
          ->order_by('vacancies.date', 'DESC')

          ->get();

  return $query->result_array();

}
function get_departments(){

    $query=$this->db->select('*')

           ->from('departments')

          ->get();

  return $query->result();;  

}
function getDepartmentMembers($id){

    $query=$this->db->select('*')

                  ->from('staff')

                  ->where('department_id', $id)

                  ->get();

    return $query->result_array();  

}


 function searchmain($keyword,$table){
    if (! empty($keyword)){
      $this->db->or_like('en_title', $keyword);
      $this->db->or_like('ar_title', $keyword);
      $this->db->or_like('en_description', $keyword);
      $this->db->or_like('ar_description', $keyword);
       $query = $this->db->get($table);
        if ($query->num_rows() > 0){
           return $query->result_array();
          }else {
        return false ;
      }   
      }
    else {
       return false ;
      
     }
    }

    function searchboard($keyword){
    if (! empty($keyword)){
      $this->db->or_like('en_name', $keyword);
      $this->db->or_like('ar_name', $keyword);
      $this->db->or_like('en_description', $keyword);
      $this->db->or_like('ar_description', $keyword);
      $this->db->or_like('en_position', $keyword);
      $this->db->or_like('ar_position', $keyword); 
     $query = $this->db->get('board');
        if ($query->num_rows() > 0){
           return $query->result_array();
          }else {
        return false ;
      }   
      }
    else {
       return false ;
      
     }
    }
    function searchstaff($keyword){
    if (! empty($keyword)){
      $this->db->or_like('en_name', $keyword);
      $this->db->or_like('ar_name', $keyword);
      $this->db->or_like('en_description', $keyword);
      $this->db->or_like('ar_description', $keyword);
      $this->db->or_like('en_position', $keyword);
      $this->db->or_like('ar_position', $keyword);       
      $query = $this->db->get('staff');
        if ($query->num_rows() > 0){
           return $query->result_array();
          }else {
        return false ;
      }   
      }
    else {
       return false ;
      
     }
    }

    function searchfaq($keyword){
    if (! empty($keyword)){
      $this->db->or_like('en_question', $keyword);
      $this->db->or_like('ar_question', $keyword);
      $this->db->or_like('en_answer', $keyword);
      $this->db->or_like('ar_answer', $keyword);
       $query = $this->db->get('faq');
        if ($query->num_rows() > 0){
           return $query->result_array();
          }else {
        return false ;
      }   
      }
    else {
       return false ;
      
     }
    }
function searchcategories($keyword){
    if (! empty($keyword)){
      $this->db->or_like('en_title', $keyword);
      $this->db->or_like('ar_title', $keyword);

       $query = $this->db->get('main_issues_categories');
        if ($query->num_rows() > 0){
           return $query->result_array();
          }else {
        return false ;
      }   
      }
    else {
       return false ;
      
     }
    }



 function searchpages($keyword,$table){
    if (! empty($keyword)){
      $this->db->or_like('en_title', $keyword);
      $this->db->or_like('ar_title', $keyword);
      $this->db->or_like('en_content', $keyword);
      $this->db->or_like('ar_content', $keyword);
       $query = $this->db->get($table);
        if ($query->num_rows() > 0){
           return $query->result_array();
          }else {
        return false ;
      }   
      }
    else {
       return false ;
      
     }
    }
 function searchsubpages($keyword){
    if (! empty($keyword)){
    
       $query =$this->db->select('*, sub_pages.id as id,sub_pages.en_title as en_title, sub_pages.ar_title as ar_title, sub_pages.en_description as en_description, sub_pages.ar_description as ar_description,sub_pages.name as name,sub_pages.url as url, pages.name as page_name')->from('sub_pages')
        ->join('pages', 'pages.id = sub_pages.page_id')
        ->like('sub_pages.en_title', $keyword)
      ->or_like('sub_pages.ar_title', $keyword)
      ->or_like('sub_pages.ar_description', $keyword)
    ->or_like('sub_pages.en_description', $keyword)->
    get();
        if ($query->num_rows() > 0){
           return $query->result_array();
          }else {
        return false ;
      }   
      }
    else {
       return false ;
      
     }
    }
    


function deletebrandImages($id){

if ($id != NULL)

    {

        $this->db->where('brand_id', $id);                    

        $this->db->delete('brands_images');                        

    }

}

function deletenewsImages($id){

if ($id != NULL)

    {

        $this->db->where('news_id', $id);                    

        $this->db->delete('news_images');                        

    }

}

function deleteGalleryImages($id){

if ($id != NULL)

    {

        $this->db->where('album_id', $id);                    

        $this->db->delete('album_images');                        

    }

}



function getItemByname($table,$name){// for drop list 

		

		$query= $this->db->get_where($table, array('name' => $name));      

		return $query->row(); 	

}




function check_name($name , $table){
    $query= $this->db->get_where($table, array('name' => $name));      

        $count = $query->num_rows(); 

       If($count!=0){ return true; } else {return false;}

}

function check_name_page($page_id , $subpage){
    $query= $this->db->get_where('sub_pages', array('name' => $subpage,'page_id' => $page_id));      

        $count = $query->num_rows(); 

       If($count!=0){ return true; } else {return false;}

}




function check($id , $table){



    $query= $this->db->get_where($table, array('id' => $id));      



    



        $count = $query->num_rows(); 







       If($count!=0){



       return true;



       } else {



    return false;



     }



}




function find_url($url,$table){// for drop list 

        if ($url == NULL)

    {

        return NULL;

    }

        $this->db->escape($url);

    $this->db->where('url', $url);


    $query = $this->db->get($table);

    if ($query->num_rows() > 0){

        $result = $query->row();


         return $result;

    }else { 


         return false; 

    }



}



function getLatestItems($table,$limit,$sort,$order){
 
    $query=$this->db->select('*')

          ->from($table)

          ->order_by($sort, $order)

          ->limit($limit)

           ->get();

    return $query->result_array();  

}


}

?>