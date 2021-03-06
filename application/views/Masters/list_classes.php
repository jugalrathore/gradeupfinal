<link rel="stylesheet" href="<?=base_url('assets')?>/stylesheets/jPages.css">
<script src="<?=base_url('assets/javascripts')?>/jPages.js"></script>
<link rel="stylesheet" href="<?=base_url('assets')?>/stylesheets/select2.css">
<script src="<?=base_url('assets/javascripts')?>/select2.min.js"></script>
<div id="content-wrapper">
    <ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>        
        <li class="active"><a href="#">Class Master</a></li>
    </ul>
    <div class="page-header">			
        <div class="row">
            <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Class Master</h1>
            <div class="col-xs-12 col-sm-8">
                <div class="row">                    
                    <hr class="visible-xs no-grid-gutter-h">
                    <div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="<?=base_url($currentModule."/add_classes")?>"><span class="btn-label icon fa fa-plus"></span>Add Class</a></div>                        
                   
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-12">&nbsp;</div>
        </div>
        <div class="row ">
            <div class="col-sm-12">
                <div class="panel">
                <div class="panel-heading">
                        <span class="panel-title">Class List</span>
                        <div class="holder"></div>
                </div>
                <div class="panel-body">
                    <div class="table-info">                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                    <th>Sr. No.</th>
									<th>Class Name</th>
                                    <th>Added By</th> 
									<th>Added On</th>  
									<th>Updated By</th> 
									<th>Updated On</th> 
									<th>Options</th>
                            </tr>
                        </thead>
                        <tbody id="itemContainer">
                            <?php
							
	

                            $j=1;
                            for($i=0;$i<count($classes_details);$i++)
                            {
                            ?>
                            <tr <?=$classes_details[$i]["status"]=="0"?"style='background-color:#FBEFF2'":""?>>
                                <td><?=$j?></td>
								<td><?=$classes_details[$i]['class_name']?></td>
								<td><?=$classes_details[$i]['added_by']?></td>
								<td><?=$classes_details[$i]['added_on']?></td>
								<td><?=$classes_details[$i]['updated_by']?></td>
								<td><?=$classes_details[$i]['updated_on']?></td>
                              
                       
                              <td>
                                    <a href="<?=base_url($currentModule."/edit_classes/".$classes_details[$i]['class_id'])?>"><i class="fa fa-edit"></i></a>                                                                        
                                   <a href='<?=$classes_details[$i]["status"]=="0"?"disable/".$classes_details[$i]["class_id"]:"enable/".$classes_details[$i]["class_id"]?>'><i class='fa <?=$classes_details[$i]["status"]=="0"?"fa-ban":"fa-check"?>' title='<?=$classes_details[$i]["status"]=="0"?"Disable":"Enable"?>'></i></a>
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
