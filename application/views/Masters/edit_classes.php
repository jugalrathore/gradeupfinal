<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="<?=base_url()?>ckeditor/samples/css/samples.css">
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Masters</a></li>
        <li class="active"><a href="#">Edit Classes</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Edit Classes</h1>
            <div class="col-xs-12 col-sm-8">
                <div class="row">                    
                    <hr class="visible-xs no-grid-gutter-h">
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
                    <div class="table-info">
					<div class="error">
					<?php
					if($cnt>0){
					echo"The Class You Want To Add Is Already exist";	
				     }
					?>
					</div>
                        <?php echo form_open_multipart('Masters/edit_classes/'.$this->uri->segment(3).'');?>
                            <table class="table table-bordered">                       
                        <tbody>
                            <tr>
                                <td>Class Name</td>
                                <td>
                                    <input type="hidden" id="id" name="id" value="" class="form-control" />
                                    <input type="text" id="class_name" name="class_name" class="form-control" value="<?=isset($_REQUEST['class_name'])?$_REQUEST['class_name']:$classes_list[0]['class_name']?>" /> 
                                <span style="color:red;"><?php echo form_error('class_name');?></span>
                                </td>
                            </tr> 
							   

                                <td colspan="2">
                                    <center>
                                        <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                                        <button class="btn btn-primary" type="button" onclick="window.location='<?=base_url($currentModule."/list_classes")?>'" id="cancel">Cancel</button>
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