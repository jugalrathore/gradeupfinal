<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Masters extends CI_Controller{


    var $currentModule="";
    var $title="";
   
   public function __construct() 
    {

		//exit(0);
	//	ini_set('display_errors', 1);
        global $menudata;
        parent:: __construct();
        
	//	error_reporting(1);

// Report runtime errors
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
//error_reporting(E_ALL);

        $this->load->helper("url");		
        $this->load->library('form_validation');
		$this->load->helper('security');
        
        if($this->uri->segment(2)!="" && $this->uri->segment(2)!="submit" && !in_array($this->uri->segment(2), $this->skipActions))
           $title=$this->uri->segment(2);                   //Second segment of uri for action,In case of edit,view,add etc.
       else
           $title=$this->master_arr['index'];
       
        
        $this->currentModule=$this->uri->segment(1);
        $this->data['currentModule']=$this->currentModule;
        
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->load->model('Masters_model');
      
        //print_r($this->get_menu_data()); die;
    }
      
    public function index()
    {
        //$this->load->view('header',$this->data);        
      //  $this->data['slokas_details']=$this->Slokas_model->get_slokas_details();
       // $this->load->view('Masters/view',$this->data);
//$this->load->view('footer');
    }
	
	function list_country()

	{ 

	    $this->load->view('header',$this->data);        
        $this->data['country_details']=$this->Masters_model->list_country();
        $this->load->view('Masters/list_country',$this->data);
        $this->load->view('footer');

	}

	/******Add by tapan for school******************/
	function list_school(){

	    $this->load->view('header',$this->data);        
        $this->data['school_details']=$this->Masters_model->list_school();
        $this->load->view('Masters/list_school',$this->data);
        $this->load->view('footer');


	}

	function add_school(){
           
		$this->load->view('header',$this->data);
         $config = array(
        array(
                'field' => 'school_name',
                'label' => 'School Name',
                'rules' => 'trim|required|xss_clean'
        ),
        array(
                'field' => 'affliate',
                'label' => 'Affliate',
                'rules' => 'trim|required|xss_clean'
                
        ),
        array(
                'field' => 'city',
                'label' => 'City',
                'rules' => 'trim|required|xss_clean'
        ),
        array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim|required|xss_clean'
        )
);

        $this->form_validation->set_rules($config);

		if($this->form_validation->run() == FALSE){
			$this->data['city_list']=$this->Masters_model->list_city();
 		    $this->load->view('Masters/add_school',$this->data);
        }else{

			$this->data['city_list']=$this->Masters_model->list_city();
			$this->data['city_sucess']=$this->Masters_model->add_school();
			if($this->data['city_sucess']>0){
			
              redirect('Masters/list_school');	
			}

 		    $this->load->view('Masters/add_school',$this->data);
		
		}
        
        $this->load->view('footer');


	}

	function edit_school(){
           
		$this->load->view('header',$this->data);
         $config = array(
        array(
                'field' => 'school_name',
                'label' => 'School Name',
                'rules' => 'trim|required|xss_clean'
        ),
        array(
                'field' => 'affliate',
                'label' => 'Affliate',
                'rules' => 'trim|required|xss_clean'
                
        ),
        array(
                'field' => 'city',
                'label' => 'City',
                'rules' => 'trim|required|xss_clean'
        ),
        array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim|required|xss_clean'
        )
);

        $this->form_validation->set_rules($config);
		$school_id=$this->uri->segment(3);

	    $this->data['school_details']=$this->Masters_model->list_school($school_id);
		
		if($this->form_validation->run() == FALSE){
			$this->data['city_list']=$this->Masters_model->list_city();
		    
 		    $this->load->view('Masters/edit_school',$this->data);
        }else{
			
				
			$this->data['city_list']=$this->Masters_model->list_city();
		
			$this->data['success']=$this->Masters_model->update_school($school_id);
			if($this->data['success']==1){
			
              redirect('Masters/list_school');	
			}

 		    $this->load->view('Masters/edit_school',$this->data);
		
		}
        
        $this->load->view('footer');


	}

 

	/********************************************/

	/************add by tapan for class**********/

    function list_classes(){

	    $this->load->view('header',$this->data);        
        $this->data['classes_details']=$this->Masters_model->list_classes();
        $this->load->view('Masters/list_classes',$this->data);
        $this->load->view('footer');
	}

	function add_classes(){
	     $this->load->view('header',$this->data);
         $config = array(
			array(
					'field' => 'class_name',
					'label' => 'Class Name',
					'rules' => 'trim|required|xss_clean'
			)
		 );

        $this->form_validation->set_rules($config);

		if($this->form_validation->run() == FALSE){
			$this->data['classes_list']=$this->Masters_model->list_classes();
 		    $this->load->view('Masters/add_classes',$this->data);
        }else{

			$this->data['classes_list']=$this->Masters_model->list_classes();
			$this->data['classes_sucess']=$this->Masters_model->add_classes();
			if($this->data['classes_sucess']>0){
			
              redirect('Masters/list_classes');	
			}

 		    $this->load->view('Masters/add_classes',$this->data);
		
		}
        
        $this->load->view('footer');

	}

	function edit_classes(){
		$this->load->view('header',$this->data);
         $config = array(
			array(
					'field' => 'class_name',
					'label' => 'Class Name',
					'rules' => 'trim|required|xss_clean'
			)
		 );

        $this->form_validation->set_rules($config);
		$class_id=$this->uri->segment(3);
		if($this->form_validation->run() == FALSE){
			$this->data['classes_list']=$this->Masters_model->list_classes($class_id);
 		    $this->load->view('Masters/edit_classes',$this->data);
        }else{

			$this->data['classes_list']=$this->Masters_model->list_classes($class_id);
			$this->data['succcess']=$this->Masters_model->update_classes($class_id);
			if($this->data['succcess']==1){
			
              redirect('Masters/list_classes');	
			}

 		    $this->load->view('Masters/edit_classes',$this->data);
		
		}
        
        $this->load->view('footer');
			
	}

	/************add by tapan for class**********/

    function list_divisions(){

	    $this->load->view('header',$this->data);        
        $this->data['division_details']=$this->Masters_model->list_divisions();
        $this->load->view('Masters/list_divisions',$this->data);
        $this->load->view('footer');
	}

	function add_divisions(){
           
		$this->load->view('header',$this->data);
         $config = array(
        array(
                'field' => 'division_name',
                'label' => 'Division Name',
                'rules' => 'trim|required|xss_clean'
        ),
        array(
                'field' => 'class_id',
                'label' => 'Class Name',
                'rules' => 'trim|required|xss_clean'
                
        )
);

        $this->form_validation->set_rules($config);

		if($this->form_validation->run() == FALSE){
			$this->data['classes_list']=$this->Masters_model->list_classes();
 		    $this->load->view('Masters/add_divisions',$this->data);
        }else{

			$this->data['classes_list']=$this->Masters_model->list_classes();
			$this->data['success']=$this->Masters_model->add_division();
			if($this->data['success']>0){
			
              redirect('Masters/list_divisions');	
			}

 		    $this->load->view('Masters/add_divisions',$this->data);
		
		}
        
        $this->load->view('footer');


	}

	function edit_divisions(){
           
		$this->load->view('header',$this->data);
         $config = array(
        array(
                'field' => 'division_name',
                'label' => 'Division Name',
                'rules' => 'trim|required|xss_clean'
        ),
        array(
                'field' => 'class_id',
                'label' => 'Class Name',
                'rules' => 'trim|required|xss_clean'
                
        )
);

        $this->form_validation->set_rules($config);

		if($this->form_validation->run() == FALSE){
			$this->data['classes_list']=$this->Masters_model->list_classes();
 		    $this->load->view('Masters/edit_divisions',$this->data);
        }else{

			$this->data['classes_list']=$this->Masters_model->list_classes();
			$this->data['success']=$this->Masters_model->edit_division();
			if($this->data['success']==1){
			
              redirect('Masters/list_divisions');	
			}

 		    $this->load->view('Masters/edit_divisions',$this->data);
		
		}
        
        $this->load->view('footer');


	}

	/************end by tapan********************/
	

			function list_states()
	{ 

		   $this->load->view('header',$this->data);        
        $this->data['state_details']=$this->Masters_model->list_states();
        $this->load->view('Masters/list_states',$this->data);
        $this->load->view('footer');

	}
	
	
	
	
	
		function list_city()
	{ 

		   $this->load->view('header',$this->data);        
        $this->data['city_list']=$this->Masters_model->list_city();
        $this->load->view('Masters/view',$this->data);
        $this->load->view('footer');

	}
	
	
			function list_chapter()
	{ 

		   $this->load->view('header',$this->data);        
        $this->data['chapter_list']=$this->Masters_model->list_chapter();
        $this->load->view('Masters/list_chapter',$this->data);
        $this->load->view('footer');

	}
	
	
	
				function list_concept()
	{ 

		   $this->load->view('header',$this->data);        
        $this->data['concept_list']=$this->Masters_model->list_concept();
        $this->load->view('Masters/list_concept',$this->data);
        $this->load->view('footer');

	}
	
	
				function list_grade()
	{ 

		   $this->load->view('header',$this->data);        
        $this->data['grade_details']=$this->Masters_model->list_grade();
        $this->load->view('Masters/view_grade',$this->data);
        $this->load->view('footer');

	}
	
	
		
				function list_user_type()
	{ 

		   $this->load->view('header',$this->data);        
        $this->data['user_type_details']=$this->Masters_model->list_user_type();
        $this->load->view('Masters/view_user_type',$this->data);
        $this->load->view('footer');

	}
	
					function list_user()
	{ 

		   $this->load->view('header',$this->data);        
        $this->data['user_list']=$this->Masters_model->list_user();
        $this->load->view('Masters/view_user',$this->data);
        $this->load->view('footer');

	}
	
	
		function add_concept()
	{ 
	
$this->form_validation->set_rules('concept', 'Concept Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
		   $this->load->view('header',$this->data);        
        $this->data['chapter_list']=$this->Masters_model->list_chapter();
		
        $this->load->view('Masters/add_concept',$this->data);
        $this->load->view('footer');
		}
		else
		{
			$concept=$this->input->post('concept');
			$chapter=$this->input->post('chapter');
		
			
				if(($this->Masters_model->ifexists_2param('master_concept','chapter_id',$chapter,'concept_name',$concept))>0)
			//if(($this->Masters_model->check_avail('master_concept','chapter_id',$chapter,'concept_name',$concept))>0)
			{
				$error ="Concept Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/add_concept');	
			}
			else
			{
			
		$data=array(
		'chapter_id'=>$chapter,
			'concept_name'=>$concept
		);
				$query = $this->db->insert('master_concept', $data);
			
				$error ="Concept Added Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_concept');	
			}
			
		
			
			
			
		}
		
		
		

	}
	
	
	
		function edit_concept($concept_id)
	{ 

	$this->form_validation->set_rules('concept', 'Concept Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
	
		//	exit(0);
		   $this->load->view('header',$this->data);        
		           $this->data['chapter_list']=$this->Masters_model->list_chapter();
        $this->data['concept_details']=$this->Masters_model->list_concept($concept_id);
        $this->load->view('Masters/edit_concept',$this->data);
        $this->load->view('footer');

		}
				else
		{
			
				$chapter_id=$this->input->post('chapter');
			$concept_name=$this->input->post('concept');
			$recordid = $this->input->post('rid');
			//$cdat = $this->Masters_model->check_avail('master_city','state_id',$state_id,'city_name',$city_name);
			
			//if(($this->Masters_model->check_avail('master_concept','chapter_id',$chapter_id,'concept_name',$concept_name))>0)
					if(($this->Masters_model->ifexists_2param('master_concept','chapter_id',$chapter_id,'concept_name',$concept_name))>0)
			{
				
				if(($this->Masters_model->ifexists_3param('master_concept','concept_id',$recordid,'chapter_id',$chapter_id,'concept_name',$concept_name))>0)
				{
					
						
		$data=array(
		'chapter_id'=>$chapter_id,
			'concept_name'=>$concept_name
		);
		
		
				$this->db->where('chapter_id',$recordid);
		$this->db->update('master_concept',$data);
		
					
		$error ="Concept Updated Successfully";
			$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_concept/');	

			 
				}
				else
				{
				$error ="Concept Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/edit_concept/'.$recordid);
				}



			 
			}
			else
			{
			
			
			
		$data=array(
		'chapter_id'=>$chapter_id,
			'concept_name'=>$concept_name
		);
		
		
				$this->db->where('chapter_id',$recordid);
		$this->db->update('master_concept',$data);
		
					
		$error ="Concept Updated Successfully";
			$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_concept/');	
			
			}
		}

	}
	
	
	
		function add_chapter()
	{ 
	
$this->form_validation->set_rules('chapter', 'Chapter Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
		   $this->load->view('header',$this->data);        
        $this->data['subject_list']=$this->Masters_model->list_subjects();
		
        $this->load->view('Masters/add_chapter',$this->data);
        $this->load->view('footer');
		}
		else
		{
			$chapter=$this->input->post('chapter');
			$subject=$this->input->post('subject');
			//$cdat = $this->Masters_model->check_avail('master_city','state_id',$state_id,'city_name',$city_name);
			if(($this->Masters_model->ifexists_2param('master_chapter','subject_id',$subject,'chapter_name',$chapter))>0)
			{
				$error ="Chapter Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/add_chapter');	
			}
			else
			{
			
		$data=array(
		'subject_id'=>$subject,
			'chapter_name'=>$chapter
		);
				$query = $this->db->insert('master_chapter', $data);
			
				$error ="Chapter Added Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_chapter');	
			}
			
		
			
			
			
		}
		
		
		

	}
	
	
	
	
	function edit_chapter($chapter_id)
	{ 

	$this->form_validation->set_rules('chapter', 'Chapter Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
	
		//	exit(0);
		   $this->load->view('header',$this->data);        
		           $this->data['subject_list']=$this->Masters_model->list_subjects();
        $this->data['chapter_details']=$this->Masters_model->list_chapter($chapter_id);
        $this->load->view('Masters/edit_chapter',$this->data);
        $this->load->view('footer');

		}
				else
		{
			
				$subject_id=$this->input->post('subject');
			$chapter_name=$this->input->post('chapter');
			$recordid = $this->input->post('rid');
			//$cdat = $this->Masters_model->check_avail('master_city','state_id',$state_id,'city_name',$city_name);
			
			if(($this->Masters_model->ifexists_2param('master_chapter','subject_id',$subject_id,'chapter_name',$chapter_name))>0)
			//if(($this->Masters_model->check_avail('master_chapter','subject_id',$subject_id,'chapter_name',$chapter_name))>0)
			{
				
					if(($this->Masters_model->ifexists_3param('master_chapter','chapter_id',$recordid,'subject_id',$subject_id,'chapter_name',$chapter_name))>0)
					{
						$data=array(
		'subject_id'=>$subject_id,
			'chapter_name'=>$chapter_name
		);
		
		
				$this->db->where('chapter_id',$recordid);
		$this->db->update('master_chapter',$data);
		
					
		$error ="Chapter Updated Successfully";
			$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_chapter/');		
						
					}
				
				else
				{
				$error ="Chapter Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/edit_chapter/'.$recordid);	
			 
				}
			}
			else
			{
			
			
			
		$data=array(
		'subject_id'=>$subject_id,
			'chapter_name'=>$chapter_name
		);
		
		
				$this->db->where('chapter_id',$recordid);
		$this->db->update('master_chapter',$data);
		
					
		$error ="Chapter Updated Successfully";
			$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_chapter/');	
			
			}
		}

	}
	
	
	
	
			function edit_city($city_id)
	{ 

	$this->form_validation->set_rules('city', 'City Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
	
		//	exit(0);
		   $this->load->view('header',$this->data);        
		           $this->data['state_list']=$this->Masters_model->list_states();
        $this->data['city_details']=$this->Masters_model->list_city($city_id);
        $this->load->view('Masters/edit_city',$this->data);
        $this->load->view('footer');

		}
				else
		{
			
				$city_id=$this->input->post('rid');
				$state_id=$this->input->post('state');
			$city_name=$this->input->post('city');
			$recordid = $this->input->post('rid');
			//$cdat = $this->Masters_model->check_avail('master_city','state_id',$state_id,'city_name',$city_name);
			if(($this->Masters_model->ifexists_2param('master_city','state_id',$state_id,'city_name',$city_name))>0)
			{
	if(($this->Masters_model->ifexists_3param('master_city','city_id',$recordid,'state_id',$state_id,'city_name',$city_name))>0)
	{
			
		$data=array(
		'state_id'=>$this->input->post('state'),
			'city_name'=>$this->input->post('city')
		);
		
		
				$this->db->where('city_id',$recordid);
		$this->db->update('master_city',$data);
		
					
		$error ="City Updated Successfully";
			$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_city/');	
		
	}
else
{$error ="City Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/edit_city/'.$recordid);	
			 
}
			 
			}
			else
			{
			
			
			
		$data=array(
		'state_id'=>$this->input->post('state'),
			'city_name'=>$this->input->post('city')
		);
		
		
				$this->db->where('city_id',$recordid);
		$this->db->update('master_city',$data);
		
					
		$error ="City Updated Successfully";
			$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_city/');	
			
			}
		}

	}
	
	
	
	
	
	
	
	
	
		
		function add_city()
	{ 
	
$this->form_validation->set_rules('city', 'City Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
		   $this->load->view('header',$this->data);        
        $this->data['state_list']=$this->Masters_model->list_states();
		
        $this->load->view('Masters/add_city',$this->data);
        $this->load->view('footer');
		}
		else
		{
			$state_id=$this->input->post('state');
			$city_name=$this->input->post('city');
			//$cdat = $this->Masters_model->check_avail('master_city','state_id',$state_id,'city_name',$city_name);
			if(($this->Masters_model->ifexists_2param('master_city','state_id',$state_id,'city_name',$city_name))>0)
			{
				$error ="City Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/add_city');	
			}
			else
			{
			
		$data=array(
		'state_id'=>$this->input->post('state'),
			'city_name'=>$this->input->post('city')
		);
				$query = $this->db->insert('master_city', $data);
			
				$error ="City Added Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_city');	
			}
			
		
			
			
			
		}
		
		
		

	}
	
	
	
	
	
	
	function add_user()
	{
		$this->form_validation->set_rules('ufname', 'User Full Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        
 $this->data['school_list']=$this->Masters_model->list_school();
  $this->data['user_type']=$this->Masters_model->list_user_type();
        $this->load->view('Masters/add_user',$this->data);
		
        $this->load->view('footer');
		}
		else
		{
		
		
				$ufname=$this->input->post('ufname');
				$utype=$this->input->post('utype');
			$school=$this->input->post('school');
				$ucnumber=$this->input->post('ucnumber');
                $uemail=$this->input->post('uemail');
	$upassword=$this->input->post('upassword');
			//$cdat = $this->Masters_model->check_avail('master_city','state_id',$state_id,'city_name',$city_name);
			if(($this->Masters_model->ifexists_1param('master_user','user_email',$uemail))>0)
			{
				$error ="User with specified email Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/add_user');	
			}
			else
			{
			
		$data=array(
		'user_fullname'=>$ufname,
		'user_type'=>$utype,
		'school_id'=>$school,
	    'user_contactno'=>$ucnumber,
        'user_email'=>$uemail,
		'username'=>$uemail,
        'password'=>md5($upassword)
		);
				$query = $this->db->insert('master_user', $data);
			
				$error ="User Added Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_user');	
			}
	
			
		}
		
	}
	
	
	
	
	
	
	
	function edit_user($user_id)
	{
		$this->form_validation->set_rules('ufname', 'User Full Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        
 $this->data['school_list']=$this->Masters_model->list_school();
  $this->data['user_type']=$this->Masters_model->list_user_type();
  $this->data['user_details']=$this->Masters_model->list_user($user_id); 
 
        $this->load->view('Masters/edit_user',$this->data);
		
        $this->load->view('footer');
		}
		else
		{
		
		$user_id=$this->input->post('uid');
		
				$ufname=$this->input->post('ufname');
				$utype=$this->input->post('utype');
			$school=$this->input->post('school');
				$ucnumber=$this->input->post('ucnumber');
                $uemail=$this->input->post('uemail');
	$upassword=$this->input->post('upassword');
			//$cdat = $this->Masters_model->check_avail('master_city','state_id',$state_id,'city_name',$city_name);
			if(($this->Masters_model->ifexists_1param('master_user','user_email',$uemail))>0)
			{
				if(($this->Masters_model->ifexists_2param('master_user','user_id',$user_id,'user_email',$uemail))>0)
				{
					
						if($upassword!='')
			{
		
	$data=array(
		'user_fullname'=>$ufname,
		'user_type'=>$utype,
		'school_id'=>$school,
	    'user_contactno'=>$ucnumber,
        'user_email'=>$uemail,
		'username'=>$uemail,
        'password'=>md5($upassword)
		);

		
			}
			else
			{
		$data=array(
		'user_fullname'=>$ufname,
		'user_type'=>$utype,
		'school_id'=>$school,
	    'user_contactno'=>$ucnumber,
        'user_email'=>$uemail,
		'username'=>$uemail
		);
			}
				//$query = $this->db->insert('master_user', $data);
			
		$this->db->where('user_id',$user_id);
		$this->db->update('master_user',$data);
		
			
			
				$error ="User Updated Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_user');	
					
					
					
					
					
					
					
					
					
					
				}
				else
				{
				$error ="User with specified email Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/edit_user/'.$user_id);	
				}
			}
			else
			{
			if($upassword!='')
			{
		
	$data=array(
		'user_fullname'=>$ufname,
		'user_type'=>$utype,
		'school_id'=>$school,
	    'user_contactno'=>$ucnumber,
        'user_email'=>$uemail,
		'username'=>$uemail,
        'password'=>md5($upassword)
		);

		
			}
			else
			{
		$data=array(
		'user_fullname'=>$ufname,
		'user_type'=>$utype,
		'school_id'=>$school,
	    'user_contactno'=>$ucnumber,
        'user_email'=>$uemail,
		'username'=>$uemail
		);
			}
				//$query = $this->db->insert('master_user', $data);
			
		$this->db->where('user_id',$user_id);
		$this->db->update('master_user',$data);
		
			
			
				$error ="User Updated Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_user');	
			}
	
			
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function add_user_type()
	{
		$this->form_validation->set_rules('utype', 'User Type', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        

        $this->load->view('Masters/add_user_type',$this->data);
		
        $this->load->view('footer');
		}
		else
		{
		
		
				$utype=$this->input->post('utype');
	//	$marks=$this->input->post('marks');
			//$cdat = $this->Masters_model->check_avail('master_city','state_id',$state_id,'city_name',$city_name);
			if(($this->Masters_model->ifexists_1param('master_user_type','user_type',$utype))>0)
			{
				$error ="User Type Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/add_user_type');	
			}
			else
			{
			
		$data=array(
		'user_type'=>$utype
		);
				$query = $this->db->insert('master_user_type', $data);
			
				$error ="User Type Added Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_user_type');	
			}
	
			
		}
		
	}
	
	
	
	
	
	
	
			function edit_user_type($user_type_id)
	{
		$this->form_validation->set_rules('utype', 'User Type', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        
  $this->data['user_type_details']=$this->Masters_model->list_user_type($user_type_id);
        $this->load->view('Masters/edit_user_type',$this->data);

        $this->load->view('footer');
		}
		else
		{
		
		
			
		$utype=$this->input->post('utype');
			$subject_id =$this->input->post('subid');
			//$cdat = $this->Masters_model->check_avail('master_city','state_id',$state_id,'city_name',$city_name);ifexists_1param
		if(($this->Masters_model->ifexists_1param('master_user_type','user_type',$utype))>0)
			{
						if(($this->Masters_model->ifexists_2param('master_user_type','type_id',$subject_id,'user_type',$utype))>0)
						{
							
							$data=array(
'user_type'=>$utype
		);
		
		$this->db->where('type_id',$subject_id);
		$this->db->update('master_user_type',$data);
		
			
			
				$error ="User Type Added Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_user_type');		
							
							
							
							
							
						}
						else
						{
				$error ="User Type Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/add_user_type');	
						}
			}
			else
			{
			
		$data=array(
'user_type'=>$utype
		);
		
		$this->db->where('type_id',$subject_id);
		$this->db->update('master_user_type',$data);
		
			
			
				$error ="User Type Added Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_user_type');	
			}
			
		
		
		
		
		
			
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
			function add_grade()
	{
		$this->form_validation->set_rules('grade', 'Difficulty Level', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        

        $this->load->view('Masters/add_grade',$this->data);
		
        $this->load->view('footer');
		}
		else
		{
		
		
				$grade=$this->input->post('grade');
		$marks=$this->input->post('marks');
			//$cdat = $this->Masters_model->check_avail('master_city','state_id',$state_id,'city_name',$city_name);
			if(($this->Masters_model->ifexists_1param('master_grade','grade_level',$grade))>0)
			{
				$error ="Grade Level Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/add_grade');	
			}
			else
			{
			
		$data=array(
		'grade_level'=>$grade,
		'grade_marks'=>$marks,
		);
				$query = $this->db->insert('master_grade', $data);
			
				$error ="Grade Level Added Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_grade');	
			}
	
			
		}
		
	}
	
	
	
	
	
			function edit_grade($subject_id)
	{
		$this->form_validation->set_rules('grade', 'Difficulty Level', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        
  $this->data['grade_details']=$this->Masters_model->list_grade($subject_id);
        $this->load->view('Masters/edit_grade',$this->data);
		
        $this->load->view('footer');
		}
		else
		{
		
		
				$grade=$this->input->post('grade');
		$marks=$this->input->post('marks');
			$subject_id =$this->input->post('subid');
			//$cdat = $this->Masters_model->check_avail('master_city','state_id',$state_id,'city_name',$city_name);
			if(($this->Masters_model->ifexists_1param('master_grade','grade_level',$grade))>0)
			{
					if(($this->Masters_model->ifexists_2param('master_grade','grade_id',$subject_id,'grade_level',$grade))>0)
					{
						$data=array(
			'grade_level'=>$grade,
		'grade_marks'=>$marks,
		);
		
		$this->db->where('grade_id',$subject_id);
		$this->db->update('master_grade',$data);
		
			
			
				$error ="Grade Level Added Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_grade');		
					}
					else
					{
				$error ="Grade Level Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/edit_grade/'.$subject_id);	
					}
			}
			else
			{
			
		$data=array(
			'grade_level'=>$grade,
		'grade_marks'=>$marks,
		);
		
		$this->db->where('grade_id',$subject_id);
		$this->db->update('master_grade',$data);
		
			
			
				$error ="Grade Level Added Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_grade');	
			}
			
		
		
		
		
		
			
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
			function add_subject()
	{
		$this->form_validation->set_rules('subject', 'Subject Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        

        $this->load->view('Masters/add_subject',$this->data);
		
        $this->load->view('footer');
		}
		else
		{
		
		
				$subject=$this->input->post('subject');
			//$city_name=$this->input->post('city');
			//$cdat = $this->Masters_model->check_avail('master_city','state_id',$state_id,'city_name',$city_name);
			if(($this->Masters_model->ifexists_1param('master_subject','subject_name',$subject))>0)
			{
				$error ="Subject Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/add_subject');	
			}
			else
			{
			
		$data=array(
		'subject_name'=>$subject
		);
				$query = $this->db->insert('master_subject', $data);
			
				$error ="Subject Added Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_subjects');	
			}
	
			
		}
		
	}
	
	
	
	
	
			function edit_subject($subject_id)
	{
		$this->form_validation->set_rules('subject', 'Subject Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        
  $this->data['subject_details']=$this->Masters_model->list_subjects($subject_id);
        $this->load->view('Masters/edit_subject',$this->data);
		
        $this->load->view('footer');
		}
		else
		{
		
		
				$subject_id =$this->input->post('subid');
					$subject_name =$this->input->post('subject');
			//$city_name=$this->input->post('city');
			//$cdat = $this->Masters_model->check_avail('master_city','state_id',$state_id,'city_name',$city_name);
			if(($this->Masters_model->ifexists_1param('master_subject','subject_name',$subject_name))>0)
			{
				if(($this->Masters_model->ifexists_2param('master_subject','$subject_id',$subject_id,'subject_name',$subject_name))>0)
				{
					
				}
				else
				{
				$error ="Subject Already exists";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/edit_subject/'.$subject_id);	
				}
			}
			else
			{
			
		$data=array(
		'subject_name'=>$subject_name
		);
		
		$this->db->where('subject_id',$subject_id);
		$this->db->update('master_subject',$data);
		
				$query = $this->db->insert('master_subject', $data);
			
				$error ="Subject Added Successfully";
					$this->session->set_flashdata('invalid_auth', $error);
			
			 redirect('Masters/list_subjects');	
			}
			
		
		
		
		
		
			
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
					function list_subjects()
	{ 
   $this->load->view('header',$this->data);        
$this->data['subject_details']=$this->Masters_model->list_subjects();
        $this->load->view('Masters/view_subject',$this->data);
		
        $this->load->view('footer');

	}
	
	
	//jugal ends
	
	

	}

    