<?php
class Masters_model extends CI_Model 
{
    function __construct(){
        parent::__construct();
		   error_reporting(1);
		   ini_set('display_errors',1);
           error_reporting(E_ALL);
    }
      

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
           	$this->db->where('ml.city_id',$city_id); 
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
    function list_school($school_id=''){
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

	function add_classes(){
		/**********Get values************/
		$class_name        = $this->input->post('class_name');
	
		/********************************/

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
	
	   function  list_location($location_id=''){

		$this->db->distinct();
		$this->db->select('ml.city_id,ml.status,ml.id,ml.location_name,mc.id,mc.name');
		$this->db->from('master_location ml');
		$this->db->join('master_city mc','ml.city_id =mc.id');
		
        if($location_id!=""){
           	$this->db->where('ml.id',$location_id); 
		}
		//echo $this->db->last_query();
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;

    }
	
	
	    function  list_ptype($mp_id='')
    {
			$this->db->select('*');
		$this->db->from('master_propertytype');
		  if($mp_id!="")
        {
           	$this->db->where('id',$mp_id);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }

		    function  list_pstatus($city_id='')
    {
			$this->db->select('*');
		$this->db->from('master_propertystatus');
		  if($city_id!="")
        {
           	$this->db->where('id',$city_id);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
    		    function  list_amenities($amen_id='')
    {
			$this->db->select('*');
		$this->db->from('master_amenities');
		  if($amen_id!="")
        {
           	$this->db->where('id',$amen_id);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
			    function  list_units($unit_id='')
    {
			$this->db->select('*');
		$this->db->from('master_unittype');
		  if($unit_id!="")
        {
           	$this->db->where('id',$unit_id);
        }
		
		$query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
	
				    function  list_primages($project_id)
    {
			$this->db->select('*');
		$this->db->from('project_toimages');
           	$this->db->where('project_id',$project_id);
    $query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	

	
					    function  list_punits($project_id)
    {
		$this->db->select('*');
		$this->db->from('project_tounits');
           	$this->db->where('project_id',$project_id);
    $query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
					    function  list_pamenities($project_id)
    {
	$this->db->select('amenities_id');
		$this->db->from('project_toamenities');
           	$this->db->where('project_id',$project_id);
    $query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
					    function  list_pfloorplan($project_id)
    {
	$this->db->select('*');
		$this->db->from('project_floorplan');
           	$this->db->where('project_id',$project_id);
    $query = $this->db->get();
		$query = $query->result_array();
		return $query;
		
    }
	
	
	
				    function  list_projects($project_id='')
    {
		$this->db->distinct();
			$this->db->select('mp.*,ml.location_name,mc.name as cityname ,pt.name as ptype,mps.name as pstatus');
		$this->db->from('master_projects mp');
		$this->db->join('master_location ml','mp.project_location =ml.id');
		$this->db->join('master_city mc','mp.project_city =mc.id');
		$this->db->join('master_propertystatus mps','mp.project_status =mps.id');
		$this->db->join('master_propertytype pt','mp.project_type =pt.id');
		  if($project_id!="")
        {
           	$this->db->where('mp.id',$project_id);
        }
		
		$query = $this->db->get();
		//echo $this->db->last_query();
	//	exit(0);
		$query = $query->result_array();
		return $query;
		
    }
	

	
	
	
	function add_project($var)
	{
	
		 $target_dir = "uploads/primages/";
        $target_file = $target_dir .basename($_FILES["pvtour"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["pvtour"]["tmp_name"], $target_file);
		$pvtour = basename($_FILES["pvtour"]["name"]);
		
		
        $target_file = $target_dir .basename($_FILES["plocmap"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["plocmap"]["tmp_name"], $target_file);
		$plocmap = basename($_FILES["plocmap"]["name"]);
		
			
        $target_file = $target_dir .basename($_FILES["plplan"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["plplan"]["tmp_name"], $target_file);
		$plplan = basename($_FILES["plplan"]["name"]);
				
		
        $target_file = $target_dir .basename($_FILES["pbrochure"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["pbrochure"]["tmp_name"], $target_file);
		$pbrochure = basename($_FILES["pbrochure"]["name"]);	
				
			$data=array(
		'project_name'=>$var['pname'],
		'project_location'=>$var['plocation'],
		'project_city'=>$var['pcity'],
		'project_type'=>$var['ptype'],
		'project_status'=>$var['pstatus'],
		'virtual_tour'=>$pvtour,
		'contact_us'=>$var['pcontactus'],
		'location_map'=>$plocmap,
		'layout_plan'=>$plplan,
		'about_project'=>$var['aboutprj'],
'project_brochure'=>$pbrochure,
               );
			$query = $this->db->insert('master_projects', $data);
						$prj_id=$this->db->insert_id();
					$prjamen = $this->input->post('prjamen');
		$punitname = $this->input->post('punitname');
		$punitarea = $this->input->post('punitarea');	
			$spectitle = $this->input->post('spectitle');
		$specdesc = $this->input->post('specdesc');
		
		
			for($i=0;$i<count($spectitle);$i++)		
			{
				$data=array(
		'project_id'=>$prj_id,
		'title'=>$spectitle[$i],
		'description'=>$specdesc[$i]
		);
				$query = $this->db->insert('project_specification', $data);
			}	
			
			
			
					for($i=0;$i<count($prjamen);$i++)		
			{
				$data=array(
		'project_id'=>$prj_id,
		'amenities_id'=>$prjamen[$i]
		);
				$query = $this->db->insert('project_toamenities', $data);
			}	
			
			for($j=0;$j<count($punitname);$j++)		
			{
				$data=array(
		'project_id'=>$prj_id,
		'unit_id'=>$punitname[$j],
		'unit_area'=>$punitarea[$j]
		);
				$query = $this->db->insert('project_tounits', $data);
			}	
				


    $files = $_FILES;
    $cpt = count($_FILES['pimage']);
	
	var_dump($_FILES['pimage']['name']);

	echo  count($_FILES['pimage']['name'])."*******************************";
$pimagetitle = $this->input->post('pimagetitle');
$fplanname = $this->input->post('fplanname');
    for($i=0; $i<count($_FILES['pimage']['name']); $i++)
    {           
     
		
		 $target_dir = "uploads/primages/";
        $target_file = $target_dir .basename($_FILES["pimage"]["name"][$i]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["pimage"]["tmp_name"][$i], $target_file);
		$imgname = basename($_FILES["pimage"]["name"][$i]);
//echo $imgname;
       $data=array(
		'project_id'=>$prj_id,
		'title'=>$pimagetitle[$i],
		'image'=>$imgname
		);
				$query = $this->db->insert('project_toimages', $data);
	   
	   
    }
	
	
	    $files = $_FILES;
    $cpt = count($_FILES['fplanimage']);
	
	var_dump($_FILES['fplanimage']['name']);

	echo  count($_FILES['fplanimage']['name'])."*******************************";

    for($i=0; $i<count($_FILES['fplanimage']['name']); $i++)
    {           
     
		
		 $target_dir = "uploads/primages/";
        $target_file = $target_dir .basename($_FILES["fplanimage"]["name"][$i]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		move_uploaded_file($_FILES["fplanimage"]["tmp_name"][$i], $target_file);
		$imgname2 = basename($_FILES["fplanimage"]["name"][$i]);
//echo $imgname;
       $data=array(
		'project_id'=>$prj_id,
		'title'=>$fplanname[$i],
		'image'=>$imgname2
		);
				$query = $this->db->insert('project_floorplan', $data);
	   
	   
    }
	
	
	
	
	
	
	
	
	
	
 redirect('Masters/list_projects');
		

	}
	


}
