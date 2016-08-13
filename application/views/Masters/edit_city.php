<script src="<?=base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>ckeditor/samples/js/sample.js"></script>
<link rel="stylesheet" href="<?=base_url()?>ckeditor/samples/css/samples.css">
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Masters</a></li>
        <li class="active"><a href="#">Edit City</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Edit City</h1>
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
                        <?php echo form_open_multipart('Masters/add_city');?>
                            <table class="table table-bordered">                       
                        <tbody>
                            <tr>
                                <td>City Name</td>
                                <td>
                                    <input type="hidden" id="id" name="id" value="" class="form-control" />
             <input type="text" id="city" name="city" class="form-control" value="<?=isset($city_details['city_name'])?$city_details['city_name']:''?>" /> 
                                <span style="color:red;"><?php echo form_error('title');?></span>
                                </td>
                            </tr> 
							       <tr>
                                <td>Select State</td>
                                <td>
                                    <input type="hidden" id="id" name="id" value="" class="form-control" />
               <select class="form-control" name="state" id="state" required="" onchange="">
								<option value="">--Select State--</option>
								    <?php
                                    for($i=0;$i<count($state_list);$i++)
                                    {
                                ?>
     <option value="<?=$state_list[$i]['state_id']?>" <?php if($state_list[$i]['state_id']==$city_details['state_id']){echo "selected";}  ?>><?=$state_list[$i]['state_name']?></option>
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