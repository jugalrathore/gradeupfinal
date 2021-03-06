<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="<?=base_url()?>ckeditor/samples/css/samples.css">
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Masters</a></li>
        <li class="active"><a href="#">Add User Type </a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Add User Type</h1>
            <div class="col-xs-12 col-sm-8">
                <div class="row">                    
                    <hr class="visible-xs no-grid-gutter-h">
<!--                    <div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" onclick="javascript:addMaster('<?=site_url($currentModule."/add_user_type")?>');" href="#"><span class="btn-label icon fa fa-plus"></span>Create Roles</a></div>                        
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
						<?php
				
					$invalid_auth= $this->session->flashdata('invalid_auth'); 
				if(!empty($invalid_auth)){ echo '<div class="error-msg" style="margin-left:0%"><ul><li>'.$invalid_auth.'</li></ul></div>'; }
			echo validation_errors('<div class="error-msg" style="margin-left:0%"><ul><li>','</li></ul></div>');
			
			?>
                <div class="panel-heading">
                        <span class="panel-title">Add User Type</span>
                </div>
                <div class="panel-body">
                    <div class="table-info">
                        <?php echo form_open_multipart('Masters/add_user_type');?>
                            <table class="table table-bordered">                       
                        <tbody>
                            <tr>
                                <td>User Type</td>
                                <td>
                                    <input type="hidden" id="id" name="id" value="" class="form-control" />
                      <input type="text" id="utype" name="utype" class="form-control" value="<?=isset($_REQUEST['title'])?$_REQUEST['title']:''?>" /> 
                                <span style="color:red;"><?php echo form_error('title');?></span>
                                </td>
                            </tr> 
							
							    
							
                          <tr>
                                <td colspan="2">
                                    <center>
                                        <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                      <button class="btn btn-primary" type="button" onclick="window.location='<?=base_url($currentModule."/view")?>'" id="cancel">Cancel</button>
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