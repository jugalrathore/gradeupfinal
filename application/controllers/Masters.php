<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Masters extends CI_Controller{


    var $currentModule="";
    var $title="";
   
    public function __construct() 
    {
        global $menudata;
        parent:: __construct();
        $this->load->helper("url");		
        $this->load->library('form_validation');
        
        if($this->uri->segment(2)!="" && $this->uri->segment(2)!="submit" && !in_array($this->uri->segment(2), $this->skipActions))
           $title=$this->uri->segment(2);                   //Second segment of uri for action,In case of edit,view,add etc.
           else
           $title=$this->master_arr['index'];
       
        
        $this->currentModule=$this->uri->segment(1);
        $this->data['currentModule']=$this->currentModule;
        $this->load->library('form_validation');
		$this->load->helper('security');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->load->model('Masters_model');
      
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
	
			function edit_city($city_id)
	{ 

	$this->form_validation->set_rules('city', 'City Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
	
	
		   $this->load->view('header',$this->data);        
		           $this->data['state_list']=$this->Masters_model->list_states();
        $this->data['city_details']=$this->Masters_model->list_city($city_id);
        $this->load->view('Masters/edit_city',$this->data);
        $this->load->view('footer');
		
		}
				else
		{
			
		$data=array(
		'state_id'=>$this->input->post('state'),
			'city_name'=>$this->input->post('city')
		);
				$query = $this->db->insert('master_city', $data);
			
			 redirect('Masters/view');	
			
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
			
		$data=array(
		'state_id'=>$this->input->post('state'),
			'city_name'=>$this->input->post('city')
		);
				$query = $this->db->insert('master_city', $data);
			
			 redirect('Masters/view');	
			
			
			
			
			
			
		}
		
		
		

	}
	
	
	
	
	
	
			function list_location()
	{ 
	
   $this->load->view('header',$this->data);        
$this->data['slokas_details']=$this->Masters_model->list_location();
        $this->load->view('Masters/view_location',$this->data);
		
        $this->load->view('footer');
	}
	
				function list_propertytype()
	{ 
   $this->load->view('header',$this->data);        
$this->data['slokas_details']=$this->Masters_model->list_ptype();
        $this->load->view('Masters/view_ptype',$this->data);
		
        $this->load->view('footer');

	}
	
				function list_propertystatus()
	{ 
	   $this->load->view('header',$this->data);        
$this->data['slokas_details']=$this->Masters_model->list_pstatus();
        $this->load->view('Masters/view_pstatus',$this->data);
		
        $this->load->view('footer');

	}
	
	
					function list_amenities()
	{ 
	   $this->load->view('header',$this->data);        
$this->data['slokas_details']=$this->Masters_model->list_amenities();
        $this->load->view('Masters/view_amenities',$this->data);
		
        $this->load->view('footer');

	}
	
						function list_units()
	{ 
	   $this->load->view('header',$this->data);        
$this->data['slokas_details']=$this->Masters_model->list_units();
        $this->load->view('Masters/view_units',$this->data);
		
        $this->load->view('footer');

	}
	
	
/*
	function add_city()
	{
		$this->form_validation->set_rules('cname', 'City Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        

        $this->load->view('Masters/add_city',$this->data);
		
        $this->load->view('footer');
		}
		else
		{
			
			$data=array(
		'name'=>$this->input->post('cname')
		);
				$query = $this->db->insert('master_city', $data);
			
			 redirect('Masters/list_city');
			
		}
		
	}
	
	*/
	
	
	function add_pstatus()
	{
		$this->form_validation->set_rules('pstatus', 'Project Status Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        

        $this->load->view('Masters/add_pstatus',$this->data);
		
        $this->load->view('footer');
		}
		else
		{
			
			$data=array(
		'name'=>$this->input->post('pstatus')
		);
				$query = $this->db->insert('master_propertystatus', $data);
			
			 redirect('Masters/list_propertystatus');
			
		}
		
	}
	
	
	
	
		function add_ptype()
	{
		$this->form_validation->set_rules('ptype', 'Project Type', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        

        $this->load->view('Masters/add_ptype',$this->data);
		
        $this->load->view('footer');
		}
		else
		{
			
			$data=array(
		'name'=>$this->input->post('ptype')
		);
				$query = $this->db->insert('master_propertytype', $data);
			
			 redirect('Masters/list_propertytype');
			
		}
		
	}
	
	
	
	
			function add_pamen()
	{
		$this->form_validation->set_rules('pamen', 'Amenity Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        

        $this->load->view('Masters/add_pamen',$this->data);
		
        $this->load->view('footer');
		}
		else
		{
			
			$data=array(
		'name'=>$this->input->post('pamen')
		);
				$query = $this->db->insert('master_amenities', $data);
			
			 redirect('Masters/list_amenities');
			
		}
		
	}
	
	
				function add_punit()
	{
		$this->form_validation->set_rules('utype', 'Unit Type', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        

        $this->load->view('Masters/add_punit',$this->data);
		
        $this->load->view('footer');
		}
		else
		{
			
			$data=array(
		'unit_type'=>$this->input->post('utype')
		);
				$query = $this->db->insert('master_unittype', $data);
			
			 redirect('Masters/list_units');
			
		}
		
	}
	
	
	
	
	
		function add_location()
	{
		$this->form_validation->set_rules('lname', 'Location Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        
$this->data['project_city']=$this->Masters_model->list_city();
        $this->load->view('Masters/add_location',$this->data);
		
        $this->load->view('footer');
		}
		else
		{
			
			$data=array(
		'location_name'=>$this->input->post('lname'),
		'city_id'=>$this->input->post('city')
		);
				$query = $this->db->insert('master_location', $data);
			
			 redirect('Masters/list_location');
			
		}
		
	}
	
	

	
	
	
	
	
	
							function list_projects()
	{ 
	   $this->load->view('header',$this->data);        
$this->data['slokas_details']=$this->Masters_model->list_projects();
        $this->load->view('Masters/view_projects',$this->data);
		
        $this->load->view('footer');

	}
	
	function add_project()
	{
			$this->load->library('form_validation');
				$this->form_validation->set_rules('pname', 'Project Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        
$this->data['project_city']=$this->Masters_model->list_city();
$this->data['project_location']=$this->Masters_model->list_location();
$this->data['project_type']=$this->Masters_model->list_ptype();
$this->data['project_status']=$this->Masters_model->list_pstatus();
$this->data['project_amenities']=$this->Masters_model->list_amenities();
$this->data['project_units']=$this->Masters_model->list_units();
        $this->load->view('Masters/add_project',$this->data);
		
        $this->load->view('footer');
		
		}
		else
		{
				
					
		$prjid =$this->Masters_model->add_project($_POST);
		
	   $this->load->view('header',$this->data);        
$this->data['slokas_details']=$this->Masters_model->list_projects();
        $this->load->view('Masters/view_projects',$this->data);
		
        $this->load->view('footer');

		}
		
		
		
		
		
		
	}
	
    
	
	
	
		function project_edit($project_id)
	{
			$this->load->library('form_validation');
				$this->form_validation->set_rules('pname', 'Project Name', 'trim|required');
			if($this->form_validation->run() == FALSE)
		{
			   $this->load->view('header',$this->data);        
$this->data['project_city']=$this->Masters_model->list_city();
$this->data['project_location']=$this->Masters_model->list_location();
$this->data['project_type']=$this->Masters_model->list_ptype();
$this->data['project_status']=$this->Masters_model->list_pstatus();
$this->data['project_amenities']=$this->Masters_model->list_amenities();
$this->data['project_units']=$this->Masters_model->list_units();
$this->data['project_details']=$this->Masters_model->list_projects($project_id);
$this->data['project_pimages']=$this->Masters_model->list_primages($project_id);
$this->data['project_punits']=$this->Masters_model->list_punits($project_id);
$this->data['project_pamenties']=$this->Masters_model->list_pamenities($project_id);
$this->data['project_pfplan']=$this->Masters_model->list_pfloorplan($project_id);


        $this->load->view('Masters/edit_project',$this->data);
		
        $this->load->view('footer');
		
		}
		else
		{
				
					
		$prjid =$this->Masters_model->add_project($_POST);
		
	   $this->load->view('header',$this->data);        
$this->data['slokas_details']=$this->Masters_model->list_projects();
        $this->load->view('Masters/view_projects',$this->data);
		
        $this->load->view('footer');

		}
		
		
		
		
		
		
	}
	
	
	
	
	
	
    public function view()
    {
        $this->load->view('header',$this->data);        
        $this->data['slokas_details']=$this->Slokas_model->get_slokas_details();
        $this->load->view('Slokas/view',$this->data);
        $this->load->view('footer');
    }
    
    public function add()
    {
        $this->load->view('header',$this->data);        
        $this->data['slokas_details']=$this->Slokas_model->get_slokas_details();
        $this->load->view('Slokas/add',$this->data);
        $this->load->view('footer');
    }
    
    public function submit()
    {
         
         $config=array(
			array('field'   => 'title',
			'label'   => 'Title',
			'rules'   => 'trim|required'
			),
                        array('field'   => 'description',
			'label'   => 'Description',
			'rules'   => 'trim|required'
			)
                 );
        $this->form_validation->set_rules($config); 
        $id=$this->input->post('id');
        
        $target_dir = "uploads/slokas/";
        $target_file = $target_dir .basename($_FILES["attachment"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        if($id=="")
        {
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('header');
                $this->load->view('Slokas/add',  $this->data);
                $this->load->view('footer');
            }
            else
            {

                    if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file)) 
                    {
                        //echo "The file ". basename( $_FILES["attachment"]["name"]). " has been uploaded.";
                    }                     


                
                $title=$this->input->post("title");               
                $description=  ($this->input->post("description")); 
                $attachment=$_FILES["attachment"]["name"];                                
                $insert_array=array("title"=>$title,"description"=>$description,"attachment"=>$attachment,"inserted_by"=>$this->session->userdata("uid"),"inserted_datetime"=>date("Y-m-d H:i:s"));                                
                $this->db->insert('slokas_master', $insert_array); 
                $last_inserted_id=$this->db->insert_id();
                
                if($last_inserted_id)
                {
                    redirect(base_url("Slokas/view?error=0"));
                }
                else
                {
                    redirect(base_url("Slokas/view?error=1"));
                }
            }
        }
        else
        {
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('header');
                //print_r($this->input->post()); die;
                $slok_id=$this->input->post("id");
                $this->data['slokas_details']=  array_shift($this->Slokas_model->get_slokas_details($slok_id));    
                $this->load->view('Slokas/edit',  $this->data);
                $this->load->view('footer');
            }
            else
            {                
                if($_FILES["attachment"]["name"]!="")
                {
                    @move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file);                    
                }
                
                $sid=$this->input->post("id");
                $title=$this->input->post("title");               
                $description=$this->input->post("description"); 
                $attachment=$_FILES["attachment"]["name"];  
                
                $update_array=array("title"=>$title,"description"=>$description,"updated_by"=>$this->session->userdata("uid"),"updated_datetime"=>date("Y-m-d H:i:s"));                                
                if($_FILES["attachment"]["name"]!="")
                {
                    $update_array["attachment"]=$attachment;
                }
                $where=array("sid"=>$sid);
                $this->db->where($where);
                
                if($this->db->update('slokas_master', $update_array))
                {
                    redirect(base_url("Slokas/view?error=0"));
                }
                else
                {
                    redirect(base_url("Slokas/view?error=1"));
                }                
               
                $this->db->update('slokas_master', $update_array,"sid='".$id."'"); 
                redirect(base_url("Location/view"));
            }
        }      
     }
    public function edit()
    {
        $this->load->view('header');        
        $slok_id=$this->uri->segment(3);         
        $this->data['slokas_details']=  array_shift($this->Slokas_model->get_slokas_details($slok_id));                    
        $this->load->view('Slokas/edit',$this->data);
        $this->load->view('footer');
    }
    
    public function disable()
    {
        ini_set("display_errors", "on");
        $this->load->view('header');        
        $slok_id=$this->uri->segment(3);   
       // $update_array=array("status"=>"N","updated_datetime"=>date("Y-m-d H:i:s"));                                
         $update_array=array("status"=>"N");                                
        $where=array("sid"=>$slok_id);
        $this->db->where($where);
        
        if($this->db->update('slokas_master', $update_array))
        {
            redirect(base_url("Slokas/view?error=0"));
        }
        else
        {
            redirect(base_url("Slokas/view?error=1"));
        }  
        $this->load->view('footer');
    }
    
    public function enable()
    {
        $this->load->view('header');        
        $slok_id=$this->uri->segment(3);   
        $update_array=array("status"=>"Y","updated_datetime"=>date("Y-m-d H:i:s"));                                
        $where=array("sid"=>$slok_id);
        $this->db->where($where);
        
        if($this->db->update('slokas_master', $update_array))
        {
            redirect(base_url("Slokas/view?error=0"));
        }
        else
        {
            redirect(base_url("Slokas/view?error=1"));
        }  
        $this->load->view('footer');
    }
    public function search()
    {        
        $title=$this->input->post("title");
        $slokas_details=  $this->Slokas_model->get_slokas_details_search($title);                    
        echo json_encode(array("slokas_details"=>$slokas_details));
    }     
}

    