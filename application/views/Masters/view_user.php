<?php
//echo "<pre>";print_r($slokas_details); die;

?>
<link rel="stylesheet" href="<?=base_url('assets')?>/stylesheets/jPages.css">
<script src="<?=base_url('assets/javascripts')?>/jPages.js"></script>
<link rel="stylesheet" href="<?=base_url('assets')?>/stylesheets/select2.css">
<script src="<?=base_url('assets/javascripts')?>/select2.min.js"></script>
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>        
        <li class="active"><a href="#">User Master</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;User Master</h1>
            <div class="col-xs-12 col-sm-8">
                <div class="row">                    
                    <hr class="visible-xs no-grid-gutter-h">
                    <div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="<?=base_url($currentModule."/add_user")?>"><span class="btn-label icon fa fa-plus"></span>Add User</a></div>                        
                    <div class="visible-xs clearfix form-group-margin"></div>
                    <form class="pull-right col-xs-12 col-sm-6" action="">
                        <div class="input-group no-margin">
                            <span style="border:none;background: #fff;background: rgba(0,0,0,.05);" class="input-group-addon"><i class="fa fa-search"></i></span>
                                                        <select id="search_me" name="search_me" style="border:none;background: #fff;background: rgba(0,0,0,.05);" class="form-control no-padding-hr" placeholder="Search...">
                                <option value="">Select Name</option>
                                <?php
                                    for($i=0;$i<count($slokas_details);$i++)
                                    {
                                ?>
                                <option value="<?=$slokas_details[$i]['name']?>"><?=$slokas_details[$i]['name']?></option>
                                <?php
                                    }
                                ?>
                            </select>

                        </div>
                    </form>
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
                        <span class="panel-title">User List</span>
                        <div class="holder"></div>
                </div>
                <div class="panel-body">
				<?php
				
					$invalid_auth= $this->session->flashdata('invalid_auth'); 
				if(!empty($invalid_auth)){ echo '<div class="error-msg" style="margin-left:0%"><ul><li>'.$invalid_auth.'</li></ul></div>'; }
			echo validation_errors('<div class="error-msg" style="margin-left:0%"><ul><li>','</li></ul></div>');
			
			?>
                    <div class="table-info">                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                    <th>Sr. No.</th>
                                    <th>User Full Name</th>
                                 <th>User Name</th>
								  <!-- <th>Password</th>-->
								     <th>User Type</th>
									   <th>School</th>
									     <th>User Contact Number</th>
										   <th>User Email</th>
                               <th>Options</th>
                            </tr>
                        </thead>
                        <tbody id="itemContainer">
                            <?php
                            $j=1;
                            for($i=0;$i<count($user_list);$i++)
                            {
                            ?>
                            <tr <?=$user_list[$i]["status"]=="N"?"style='background-color:#FBEFF2'":""?>>
                                <td><?=$j?></td>
                                <td><?=$user_list[$i]['user_fullname']?></td>
                         <td><?=$user_list[$i]['username']?></td>
						<!-- <td><?=$user_list[$i]['password']?></td>-->
						 <td><?=$user_list[$i]['user_type']?></td>
						 <td><?=$user_list[$i]['school_name']?></td>
						 <td><?=$user_list[$i]['user_contactno']?></td>
						 <td><?=$user_list[$i]['user_email']?></td>
					
                              <td>
                                    <a href="<?=base_url($currentModule."/edit_user/".$user_list[$i]['user_id'])?>"><i class="fa fa-edit"></i></a>                                                                        
                                    <a href='<?=$user_list[$i]["status"]=="Y"?"disable/".$user_list[$i]["chapter_id"]:"enable/".$user_list[$i]["chapter_id"]?>'><i class='fa <?=$user_list[$i]["status"]=="Y"?"fa-ban":"fa-check"?>' title='<?=$user_list[$i]["status"]=="Y"?"Disable":"Enable"?>'></i></a>
                                </td>
                            </tr>
                            <?php
                            $j++;
                            }
                            ?>                            
                        </tbody>
                    </table>                    
                </div>
                </div>
            </div>
            </div>    
        </div>
    </div>
</div>
<script>
  $("div.holder").jPages
  ({
    containerID : "itemContainer"
  });
   $("#search_me").select2({
      placeholder: "Enter title",
      allowClear: true
    });
    
    $("#search_me").on('change',function()
        {
            var search_val = $(this).val();            
            var url  = "<?=base_url().'Slokas/search/'?>";	
            var data = {title: search_val};		
            $.ajax
            ({
                type: "POST",
                url: url,
                data: data,
                dataType: "html",
                cache: false,
                crossDomain: true,
                success: function(data)
                {                       
                    var array=JSON.parse(data);
                    var str="";                    
                    for(i=0;i<=array.slokas_details.length;i++)
                    {
                        str+='<tr style="display: table-row; opacity: 1;">';
                        str+='<td>'+(i+1)+'</td>';                        
                        str+='<td>'+array.slokas_details[i].title+'</td>';
                        str+='<td>'+array.slokas_details[i].description+'</td>';
                        str+='<td><a href="<?=base_url()?>uploads/slokas/'+array.slokas_details[i].attachment+'" title="Download" target="_blank"><i class="fa fa-download"></i></a></td>';                        
                        str+='<td>';
                        str+='<a href="<?=base_url()?>Slokas/edit/'+array.slokas_details[i].sid+'"><i class="fa fa-edit"></i></a>';
                        str+='<a href="disable/'+array.slokas_details[i].sid+'"><i title="Disable" class="fa fa-ban"></i></a>';
                        str+='</td>';
                        str+='</tr>';
                        $("#itemContainer").html(str);
                    }
                },
                error: function(data)
                {
                    alert("Page Or Folder Not Created..!!");
                }
            });
        });
    
</script>    