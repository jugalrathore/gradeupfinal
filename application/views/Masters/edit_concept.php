<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="<?=base_url()?>ckeditor/samples/css/samples.css">
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Masters</a></li>
        <li class="active"><a href="#">Edit Concept</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Edit Concept</h1>
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
                        <?php echo form_open_multipart('Masters/edit_concept');?>
                            <table class="table table-bordered">                       
                        <tbody>
                            <tr>
                                <td>Concept Name</td>
                                <td>
                                    <input type="hidden" id="id" name="id" value="" class="form-control" />
             <input type="text" id="concept" name="concept" class="form-control" value="<?php echo $concept_details[0]['concept_name'];?>" /> 
			  <input type="hidden" id="rid" name="rid" value="<?php echo $concept_details[0]['concept_id'] ?>" class="form-control" />
                                <span style="color:red;"><?php echo form_error('title');?></span>
                                </td>
                            </tr> 
							       <tr>
                                <td>Select Chapter</td>
                                <td>
                                   
               <select class="form-control" name="chapter" id="chapter" required="" onchange="">
								<option value="">--Select Chapter--</option>
								    <?php
                                    for($i=0;$i<count($chapter_list);$i++)
                                    {
                                ?>
     <option value="<?=$chapter_list[$i]['chapter_id']?>" <?php if($chapter_list[$i]['chapter_id']==$concept_details[0]['chapter_id']){echo "selected";}  ?>>
	 <?=$chapter_list[$i]['chapter_name']?></option>
                                <?php
                                    }
                                ?>
																</select>
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