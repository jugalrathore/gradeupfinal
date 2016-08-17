<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="<?=base_url()?>ckeditor/samples/css/samples.css">
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Masters</a></li>
        <li class="active"><a href="#">Edit Chapter</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Edit Chapter</h1>
            <div class="col-xs-12 col-sm-8">
                <div class="row">                    
                    <hr class="visible-xs no-grid-gutter-h">
					<?php
				//var_dump($state_list[0]);
						//var_dump($city_details);
				//	exit(0);
					?>
<!--                    <div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" onclick="javascript:addMaster('<?=site_url($currentModule."/add")?>');" href="#"><span class="btn-label icon fa fa-plus"></span>Create Roles</a></div>                        
                    <div class="visible-xs clearfix form-group-margin"></div>                    -->
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-12">&nbsp;</div>
        </div>
        <div class="row ">
            <div class="col-sm-12">
                <div class="panel">
                <div class="panel-heading">
                        <span class="panel-title"></span>
                </div>
                <div class="panel-body">
					<?php
				
					$invalid_auth= $this->session->flashdata('invalid_auth'); 
				if(!empty($invalid_auth)){ echo '<div class="error-msg" style="margin-left:0%"><ul><li>'.$invalid_auth.'</li></ul></div>'; }
			echo validation_errors('<div class="error-msg" style="margin-left:0%"><ul><li>','</li></ul></div>');
			
			?>
                    <div class="table-info">
                        <?php echo form_open_multipart('Masters/edit_user');?>
                            <table class="table table-bordered">                       
                        <tbody>
                           <tr>
                                <td>User Full Name</td>
                                <td>
                                    
                            <input type="text" id="ufname" name="ufname" class="form-control" value="<?php echo $user_details[0]['user_fullname'] ?>" /> 
                                <span style="color:red;"><?php echo form_error('title');?></span>
                                </td>
                            </tr> 
							       <tr>
                                <td>Select User Type</td>
                                <td>
                                   <input type="hidden" id="uid" name="uid" value="<?php echo $user_details[0]['user_id'] ?>" class="form-control" />
               <select class="form-control" name="utype" id="utype" required="" onchange="">
								<option value="">--Select User Type--</option>
								    <?php
                                    for($i=0;$i<count($user_type);$i++)
                                    {
                                ?>
                                <option value="<?=$user_type[$i]['type_id']?>" <?php if($user_type[$i]['type_id']==$user_details[0]['type_id']){echo "selected";} ?>><?=$user_type[$i]['user_type']?></option>
                                <?php
                                    }
                                ?>
																</select>
                                <span style="color:red;"><?php echo form_error('title');?></span>
                                </td>
                            </tr> 
                         
	       <tr>
                                <td>Select School</td>
                                <td>
               <select class="form-control" name="school" id="school" required="" onchange="">
								<option value="">--Select School--</option>
								    <?php
                                    for($i=0;$i<count($school_list);$i++)
                                    {
                                ?>
                                <option value="<?=$school_list[$i]['school_id']?>" <?php if($school_list[$i]['school_id']==$user_details[0]['school_id']){echo "selected";} ?>><?=$school_list[$i]['school_name']?></option>
                                <?php
                                    }
                                ?>
																</select>
                                <span style="color:red;"><?php echo form_error('title');?></span>
                                </td>
                            </tr> 
                         
   <tr>
                                <td>User Contact Number</td>
                                <td>
                            <input type="text" id="ucnumber" name="ucnumber" class="form-control" value="<?php echo $user_details[0]['user_contactno'] ?>" /> 
                                <span style="color:red;"><?php echo form_error('title');?></span>
                                </td>
                            </tr> 


							   <tr>
                                <td>User Email</td>
                                <td>
                                    <input type="text" id="uemail" name="uemail" class="form-control" value="<?php echo $user_details[0]['user_email'] ?>" /> 
                                <span style="color:red;"><?php echo form_error('title');?></span>
                                </td>
                            </tr> 


   <tr>
                                <td>User Password</td>
                                <td>
                                    <input type="text" id="upassword" name="upassword" class="form-control" value="" Placeholder="Left Blank if do not want to update current password" /> 
                                <span style="color:red;"><?php echo form_error('title');?></span>
                                </td>
                            </tr> 
 
                          <tr>
                                <td colspan="2">
                                    <center>
                                        <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                                        <button class="btn btn-primary" type="button" onclick="window.location='<?=base_url($currentModule."/add_city")?>'" id="cancel">Cancel</button>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                    </table>  
                        </form>
                </div>
                </div>
            </div>
            </div>    
        </div>
    </div>
</div>