<?php
class Masters_model extends CI_Model 
{
    function __construct(){
        parent::__construct();

		   error_reporting(1);
		   ini_set('display_errors',1);
           error_reporting(E_ALL);

			//error_reporting(1);
		//ini_set('display_errors',1);
//error_reporting(E_ALL);

    }
      //added by jugal

    function  list_states($state_id='')
    {
		
		$this->db->distinct();
        $this->db->select('ms.state_id,ms.status,ms.state_name,mc.country_name');
		$this->db->from('master_state ms');
		$this->db->join('master_country mc','mc.country_id = ms.country_id');
		
      if($state_id!=""){
           	$this->db->where('ms.state_id',$state_id); 
		}

		$query = $this->db->get();
		 //echo $this->db->last_query();
        //exit(0);
        $query = $query->result_array();
		return $query;

    }







	  
    function  list_city($city_id='')
    {
		
					$this->db->distinct();
$this->db->select('mc.city_id,mc.state_id,mc.status,mc.city_name,ms.state_name');
		$this->db->from('master_city mc');
		$this->db->join('master_state ms','mc.state_id = ms.state_id');
		
     if($city_id!="")
        {
           	$this->db->where('mc.city_id',$city_id); 
		}

		$query = $this->db->get();
		//echo $this->db->last_query();
//exit(0);
$query = $query->result_array();
		
		return $query;
		
		
		
		
			/*$this->db->select('*');
		$this->db->from('master_city');
		  if($city_id!="")
        {
           	$this->db->where('id',$city_id);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		*/
    }
	
	
	
	
	 function  list_chapter($chapter_id='')
    {
		
					$this->db->distinct();
$this->db->select('mcp.chapter_id,mcp.subject_id,mcp.status,mcp.chapter_name,ms.subject_name');
		$this->db->from('master_chapter mcp');
		$this->db->join('master_subject ms','mcp.subject_id = ms.subject_id');
		
     if($chapter_id!="")
        {
           	$this->db->where('mcp.chapter_id',$chapter_id); 
		}

		$query = $this->db->get();
		//echo $this->db->last_query();
//exit(0);
$query = $query->result_array();
		
		return $query;
		

    }
	
	
	
	
		 function  list_concept($concept_id='')
    {
		
					$this->db->distinct();
$this->db->select('mcp.concept_id,mcp.chapter_id,mcp.status,mcp.concept_name,ms.chapter_name');
		$this->db->from('master_concept mcp');
		$this->db->join('master_chapter ms','mcp.chapter_id = ms.chapter_id');
		
     if($concept_id!="")
        {
           	$this->db->where('mcp.concept_id',$concept_id); 
		}

		$query = $this->db->get();
		//echo $this->db->last_query();
//exit(0);
$query = $query->result_array();
		
		return $query;
		

    }
	
	
	
	
	
			 function  list_grade($grade_id='')
    {
		
					$this->db->distinct();
$this->db->select('*');
		$this->db->from('master_grade');
		//$this->db->join('master_chapter ms','mcp.chapter_id = ms.chapter_id');
		
     if($grade_id!="")
        {
           	$this->db->where('grade_id',$grade_id); 
		}

		$query = $this->db->get();
		//echo $this->db->last_query();
//exit(0);
$query = $query->result_array();
		
		return $query;
		

    }
	
	
				 function  list_user_type($user_type_id='')
    {
		
					$this->db->distinct();
$this->db->select('*');
		$this->db->from('master_user_type');
		//$this->db->join('master_chapter ms','mcp.chapter_id = ms.chapter_id');
		
     if($user_type_id!="")
        {
           	$this->db->where('type_id',$user_type_id); 
		}

		$query = $this->db->get();
		//echo $this->db->last_query();
//exit(0);
$query = $query->result_array();
		
		return $query;
		

    }
	
	
					 function  list_school($school_id='')
    {
		
					$this->db->distinct();
$this->db->select('*');
		$this->db->from('master_school');
		//$this->db->join('master_chapter ms','mcp.chapter_id = ms.chapter_id');
		
     if($school_id!="")
        {
           	$this->db->where('school_id',$school_id); 
		}

		$query = $this->db->get();
		//echo $this->db->last_query();
//exit(0);
$query = $query->result_array();
		
		return $query;
		

    }
	
	
	
					 function  list_user($user_id='')
    {
		
					$this->db->distinct();
$this->db->select('mu.user_id,mu.status,mu.username,mu.password,mu.user_fullname,mu.user_contactno,mu.user_email,ms.school_name,ms.school_id,mut.type_id,mut.user_type');
		$this->db->from('master_user mu');
		$this->db->join('master_school ms','mu.school_id = ms.school_id','LEFT');
		$this->db->join('master_user_type mut','mu.user_type = mut.type_id','LEFT');
     if($user_id!="")
        {
           	$this->db->where('mu.user_id',$user_id); 
		}

		$query = $this->db->get();
		//echo $this->db->last_query();
//exit(0);
$query = $query->result_array();
		
		return $query;
		

    }
	
	
	
	
	
	
	
	
	
	function list_country($country_id='')
	{
		$this->db->select('*');
		$this->db->from('master_country');
		  if($country_id!="")
        {
           	$this->db->where('id',$country_id);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
   /*************Add by tapan for school*******************/
   /* function list_school($school_id=''){
		$this->db->select('`school_id`,`city_id`, `school_name`, `affiliate`, `address`, `added_by`, `added_on`, `updated_by`, `updated_on`,`status`');
		$this->db->from('master_school');
		  if($school_id!=""){
           	$this->db->where('school_id',$school_id);
        }
		//$this->db->where('status','1');
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
    }
*/
	function add_school(){

		/**********Get values************/
		$city        = $this->input->post('city');
		$school_name = $this->input->post('school_name');
		$city        = $this->input->post('city');
		$affliate    = $this->input->post('affliate');
		$address     = $this->input->post('address');
		/********************************/

		$data=array(
			'city_id'     => $city,
			'school_name' => $school_name,
			'affiliate'   => $affliate ,
    		'address'     => $address
		);
		$query = $this->db->insert('master_school', $data);
	    $insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	function update_school($school_id){

		/**********Get values************/
		$city        = $this->input->post('city');
		$school_name = $this->input->post('school_name');
		$city        = $this->input->post('city');
		$affliate    = $this->input->post('affliate');
		$address     = $this->input->post('address');
		/********************************/

		$data=array(
			'city_id'     => $city,
			'school_name' => $school_name,
			'affiliate'   => $affliate,
    		'address'     => $address
		);

		$this->db->where('school_id', $school_id);

      	$query = $this->db->update('master_school', $data);
		if($this->db->affected_rows() >=0){
			return 1; // your code
		}else{
			return 0; // your code. 
		}
	
	}
   /*************Add by tapan for class*******************/
   function list_classes($class_id=''){


		$this->db->select('class_id,`class_name`, `added_by`, `added_on`, `updated_by`, `updated_on`, `status`');
		$this->db->from('master_class');
		  if($class_id!=""){
           	$this->db->where('class_id',$class_id);
        }
		//$this->db->where('status','1');
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
    }

	
		    function  list_subjects($sub_id='')
    {
			$this->db->select('*');
		$this->db->from('master_subject');
		  if($sub_id!="")
        {
           	$this->db->where('subject_id',$sub_id);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
	
	
	function check_avail($tablename='',$columnname1='',$columnvalue1='',$columnname2='',$columnvalue2='')
	{
			$this->db->select('*');
		$this->db->from($tablename);
		  if($columnname1!="")
        {
           	$this->db->where($columnname1,$columnvalue1);
        }
			  if($columnname2!="")
        {
           	$this->db->where($columnname2,$columnvalue2);
        }
		
		$query = $this->db->get();
		//echo $this->db->last_query();
		//var_dump($query->row_array());
		//echo count($query->row_array());
		//exit(0);
		
		return count($query->row_array());
	}
	
	
	
	
	
	
				function ifexists_1param($tablename,$recordname,$recordvalue)
	{
$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($recordname,$recordvalue);
		$query = $this->db->get();
	
return count($query->row_array());

	}
	
			function ifexists_2param($tablename,$recordname,$recordvalue,$recordname2,$recordvalue2)
	{
$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($recordname,$recordvalue);
		$this->db->where($recordname2,$recordvalue2);
		$query = $this->db->get();
			//echo $this->db->last_query();
		//exit(0);
return count($query->row_array());

	}
	
	function ifexists_3param($tablename,$recordname,$recordvalue,$recordname2,$recordvalue2,$recordname3,$recordvalue3)
	{
$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($recordname,$recordvalue);
		$this->db->where($recordname2,$recordvalue2);
		$this->db->where($recordname3,$recordvalue3);
		$query = $this->db->get();
			//echo $this->db->last_query();
	//	exit(0);
	return count($query->row_array());

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	function add_classes(){
		/**********Get values************/
		$class_name        = $this->input->post('class_name');

	
	
		$data=array(
			'class_name'     => $class_name
		);
		
    
			$query = $this->db->insert('master_class', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			//insert goes here
		
	}


	function update_classes($class_id){

		/**********Get values************/
		$class_name        = $this->input->post('class_name');
		/********************************/

		$data=array(
			'class_name'     => $class_name
		);
		$this->db->where('class_id', $class_id);
     
		$query = $this->db->update('master_class', $data);

		if($this->db->affected_rows() >=0){
		  return 1; // your code
		}else{
		  return 0; // your code. 
		}
	
	
	}

    function list_divisions($division_id=''){
        $this->db->select('`division_id`, `class_id`, `division_name`, `added_by`, `added_on`, `updated_by`, `updated_on`, `status`');
		$this->db->from('master_division');
		  if($division_id!=""){
           	$this->db->where('division_id',$division_id);
        }
		//$this->db->where('status','1');
		$query = $this->db->get();
		$query = $query->result_array();
        //echo $this->db->last_query(); //To print the query
		
		return $query;
	 }

	function add_division(){

        /**********Get values************/
		$division_name        = $this->input->post('division_name');
		$class_id        = $this->input->post('class_id');
		/********************************/

		$data=array(
			'class_id'     => $class_id,
			'division_name'     => $division_name,
		);
		
    
			$query = $this->db->insert('master_division', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			//insert goes here     


	}

	

   /**************End By tapan******************/
	
	 
}
