<?php
class Masters_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
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
		
     if($state_id!="")
        {
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	// jugal ends
	
	
	/*
	
	   function  list_location($location_id='')
    {

			$this->db->distinct();
$this->db->select('ml.city_id,ml.status,ml.id,ml.location_name,mc.id,mc.name');
		$this->db->from('master_location ml');
		$this->db->join('master_city mc','ml.city_id =mc.id');
		
     if($location_id!="")
        {
           	$this->db->where('ml.id',$location_id); 
		}
//echo $this->db->last_query();
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
	

*/
}
