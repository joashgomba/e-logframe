<?php include(APPPATH . 'views/common/head.php'); ?>
<script src="<?php echo base_url(); ?>js/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
		
   function trim(str){
	return str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');}
	function totalEncode(str){
	var s=escape(trim(str));
	s=s.replace(/\+/g,"+");
	s=s.replace(/@/g,"@");
	s=s.replace(/\//g,"/");
	s=s.replace(/\*/g,"*");
	return(s);
	}
	function connect(url,params)
	{
	var connection;  // The variable that makes Ajax possible!
	try{// Opera 8.0+, Firefox, Safari
	connection = new XMLHttpRequest();}
	catch (e){// Internet Explorer Browsers
	try{
	connection = new ActiveXObject("Msxml2.XMLHTTP");}
	catch (e){
	try{
	connection = new ActiveXObject("Microsoft.XMLHTTP");}
	catch (e){// Something went wrong
	return false;}}}
	connection.open("POST", url, true);
	connection.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	connection.setRequestHeader("Content-length", params.length);
	connection.setRequestHeader("connection", "close");
	connection.send(params);
	return(connection);
	}
	
	function validateForm(frm){
	var errors='';
		
	if (errors){
	alert('The following error(s) occurred:\n'+errors);
	return false; }
	return true;
	}
	
	function Getactivities(frm){
	if(validateForm(frm)){
	document.getElementById('activities').innerHTML='';
	var url = "<?php echo base_url(); ?>index.php/rollingactionplans/getactivities";
	
	var params = "project_id=" + totalEncode(document.frm.project_id.value );
	var connection=connect(url,params);
	
	connection.onreadystatechange = function(){
	if(connection.readyState == 4){
		document.getElementById('activities').innerHTML=connection.responseText;
		
		
	}
	if((connection.readyState == 2)||(connection.readyState == 3)){document.getElementById('activities').innerHTML = '<span style="color:green;">Sending request....</span>';}}}
	}
	
	
	function Getprojecttasks(frm){
	if(validateForm(frm)){
	document.getElementById('projecttasks').innerHTML='';
	var url = "<?php echo base_url(); ?>index.php/tasks/gettasks";
	
	var params = "taskcategory_id=" + totalEncode(document.frm.taskcategory_id.value );
	var connection=connect(url,params);
	
	connection.onreadystatechange = function(){
	if(connection.readyState == 4){
		document.getElementById('projecttasks').innerHTML=connection.responseText;
		
		
	}
	if((connection.readyState == 2)||(connection.readyState == 3)){document.getElementById('projecttasks').innerHTML = '<span style="color:green;">Sending request....</span>';}}}
	}
	
	
	function getTasks(frm){
	if(validateForm(frm)){
	document.getElementById('tasks').innerHTML='';
	var url = "<?php echo base_url(); ?>index.php/rollingactionplans/gettasks";
	
	var params =  "plannedactivity_id="+totalEncode(document.frm.plannedactivity_id.value );
	var connection=connect(url,params);
	
	connection.onreadystatechange = function(){
	if(connection.readyState == 4){
		document.getElementById('tasks').innerHTML=connection.responseText;
		
		
	}
	if((connection.readyState == 2)||(connection.readyState == 3)){document.getElementById('tasks').innerHTML = '<span style="color:green;">Sending request....</span>';}}}
	}
	
	
	function refreshList(frm){
	if(validateForm(frm)){
	document.getElementById('dependancies').innerHTML='';
	var url = "<?php echo base_url(); ?>index.php/rollingactionplans/getdependancies";
	
	var params =  "plannedactivity_id="+totalEncode(document.frm.plannedactivity_id.value );
	var connection=connect(url,params);
	
	connection.onreadystatechange = function(){
	if(connection.readyState == 4){
		document.getElementById('dependancies').innerHTML=connection.responseText;
		
		
	}
	if((connection.readyState == 2)||(connection.readyState == 3)){document.getElementById('dependancies').innerHTML = '<span style="color:green;">Sending request....</span>';}}}
	}
	
	
	
	
	function GetProjects(frm){
	if(validateForm(frm)){
	document.getElementById('projects').innerHTML='';
	var url = "<?php echo base_url(); ?>index.php/projects/getprojects";
	
	var params = "organization_id=" + totalEncode(document.frm.organization_id.value );
	var connection=connect(url,params);
	
	connection.onreadystatechange = function(){
	if(connection.readyState == 4){
		document.getElementById('projects').innerHTML=connection.responseText;
		
		
	}
	if((connection.readyState == 2)||(connection.readyState == 3)){document.getElementById('projects').innerHTML = '<span style="color:green;">Sending request....</span>';}}}
	}
	
	function regionList(frm){
	if(validateForm(frm)){
	document.getElementById('regions').innerHTML='';
	var url = "<?php echo base_url(); ?>index.php/rollingactionplans/getregions";
	
	var params =  "project_id="+totalEncode(document.frm.project_id.value );
	var connection=connect(url,params);
	
	connection.onreadystatechange = function(){
	if(connection.readyState == 4){
		document.getElementById('regions').innerHTML=connection.responseText;
		
		
	}
	if((connection.readyState == 2)||(connection.readyState == 3)){document.getElementById('regions').innerHTML = '<span style="color:green;">Sending request....</span>';}}}
	}
	
	</script>
    
<script type="text/javascript">
$(document).ready(function() {
 
 var myCounter = 0;
 $(".myDate").datepicker();
  
 $("#moreDates").click(function(){
   
  $('.myTemplate')
   .clone()
   .removeClass("myTemplate")
   .addClass("additionalDate")
   .show()
   .appendTo('#importantDates');
   
  myCounter++;
  $('.additionalDate input[name=inputDate]').each(function(index) {
   $(this).addClass("myDate");
   //$(this).attr("name",$(this).attr("name") + myCounter);
  });
   
  $(".myDate").on('focus', function(){
      var $this = $(this);
      if(!$this.data('datepicker')) {
       $this.removeClass("hasDatepicker");
       $this.datepicker();
       $this.datepicker("show");
      }
  });
   
 });
  
});
</script>		


<style> 
 .myDate { 
    border: 1px solid #999; 
    outline:0; 
    height:35px; 
    width: 275px; 
  } 
</style> 

<body>
			<?php include(APPPATH . 'views/common/navigation.php'); ?>
				<div class="container-fluid" id="content">
				<?php include(APPPATH . 'views/common/left.php'); ?>
				<div id="main">
				<div class="container-fluid">
				<?php include(APPPATH . 'views/common/pageheader.php'); ?>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="<?php echo site_url('home')?>">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="<?php echo base_url() ?>index.php/rollingactionplans">Rolling action plans</a>
						</li>
					</ul>
				<div class="close-bread">
					<a href="#">
						<i class="fa fa-times"></i>
					</a>
				</div>
				</div>
				<div class="row">
				<div class="col-sm-12">
				<div class="box box-bordered">
				<div class="box-title">
					<h3>
						<i class="fa fa-th-list"></i>Add Form
					</h3>
				</div>
				<div class="box-content nopadding">
					<?php if(validation_errors()){?>
						<p><div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Note!</strong><?php echo validation_errors(); ?>
							</div>
						</p>
					<?php } ?>
					<?php $attributes = array('name' => 'frm', 'id'=>'frm','enctype' => 'multipart/form-data', 'class'=>'form-horizontal form-striped form-validate');?>
					<?php echo form_open('rollingactionplans/add_validate',$attributes); ?>
                    
                    <div class="box-content nopadding">
								<ul class="tabs tabs-inline tabs-top">
									<li class='active'>
										<a href="#first11" data-toggle='tab'>
											<i class="fa fa-tasks"></i>Task</a>
									</li>
									<li>
										<a href="#second22" data-toggle='tab'>
											<i class="fa fa-folder-open"></i>Detail</a>
									</li>
									<li>
										<a href="#thirds3322" data-toggle='tab'>
											<i class="fa fa-calendar"></i>Dates</a>
									</li>
									<li>
										<a href="#thirds33" data-toggle='tab'>
											<i class="fa fa-user"></i>Human Resources</a>
									</li>
                                    <li>
										<a href="#fourth44" data-toggle='tab'>
											<i class="fa fa-chain"></i>Dependancies</a>
									</li>
                                    <li>
										<a href="#fifth55" data-toggle='tab'>
											<i class="fa fa-map-marker"></i>Milestones</a>
									</li>
								</ul>
								<div class="tab-content padding tab-content-inline tab-content-bottom">
									<div class="tab-pane active" id="first11">
										
                                        <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Organization</label>
                                            <div class="col-sm-10">
                                            <select name="organization_id" id="organization_id" onChange="GetProjects(this)" required="required" class='chosen-select form-control'>
                                            <option value="">Select Organization</option>
                                           <?php foreach ($organizations->result() as $organization): ?>
                                           <option value="<?php echo $organization->id;?>"><?php echo $organization->organization_name;?> </option>
                                           <?php endforeach; ?>
                                            </select>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Project</label>
                                            <div class="col-sm-10">
                                            <div id="projects">
                                            <select name="project_id" id="project_id" onChange="Getactivities(this)" required="required" class='chosen-select form-control'>
                                            <option value="">Select Project</option>
                                           <?php foreach ($projects->result() as $project): ?>
                                           <option value="<?php echo $project->id;?>"><?php echo $project->project_no;?> / <?php echo $project->project_title;?></option>
                                           <?php endforeach; ?>
                                            </select>
                                            </div>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Region</label>
                                            <div class="col-sm-10">
                                            <div id="regions">
                                            <select name="county_id" id="county_id" required="required" class='chosen-select form-control'>
                                            <option value="">Select Region</option>
                                          
                                            </select>
                                            </div>
                                               <a href="javascript:void(0)" title="" class="btn btn-success" style="margin: 5px;" onclick='regionList(this)'>List Project Regions <i class="fa fa-refresh"></i></a>
                                                
                                            </div>
                                        </div>
                                        
                                        
                                         <!--<div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Region</label>
                                            <div class="col-sm-10">
                                            <select name="county_id" id="county_id" required="required" class='chosen-select form-control'>
                                            <option value="">Select Region</option>
                                           <?php foreach ($counties->result() as $county): ?>
                                           <option value="<?php echo $county->id;?>" ><?php echo $county->county;?> </option>
                                           <?php endforeach; ?>
                                            </select>
                                                
                                            </div>
                                        </div>-->
                                        
                                        
                            
                                        <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Planned activity</label>
                                            <div class="col-sm-10">
                                            <div id="activities">
                                            <select name="plannedactivity_id" id="plannedactivity_id" class='chosen-select form-control' >
                                            <option value="0">All</option>
                                            </select>
                                            </div>
                                                
                                            </div>
                                        </div>
                                        
                        <div class="form-group">
                        <label for="textfield" class="control-label col-sm-2">Activity Type</label>
                        <div class="col-sm-10">
                             <select name="taskcategory_id" id="taskcategory_id" class="form-control" onChange="Getprojecttasks(this)" required="required">
                             <option value="">Select one</option>
                                                            <?php
                                                                foreach($taskcategories as $key=>$taskcategory)
                                                                {
                                                                    ?>
                                                                    <option value="<?php echo $taskcategory['id'];?>" <?php if(set_value('taskcategory_id')==$taskcategory['id']){echo 'selected="selected"';}?>><?php echo $taskcategory['category'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                       </select>
                        </div>
						</div>
                        
                        <div class="form-group">
                        <label for="textfield" class="control-label col-sm-2">Task</label>
                        <div class="col-sm-10">
                            <div id="projecttasks">
                                 <select name="task_id" id="task_id" class="form-control" required="required">
                                 <option value="">Select one</option>
                                                               
                           </select>
                           </div>
                        </div>
						</div>

                                        <!--<div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Task name</label>
                                            <div class="col-sm-10">
                                                <?php 
                                                $data = array('id' => 'task_name', 'name' => 'task_name','class'=>'form-control','required'=>'required');
                                                echo form_input($data, set_value('task_name'));
                                                ?>
                                            </div>
                                        </div>-->
                                        
                                        <div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Is it a milestone?</label>
				<div class="col-sm-10">
                
                <div class="check-line">
													<input type="radio" id="primary" class='icheck-me' name="primary" data-skin="square" data-color="orange" value="1" required>
													<label class='inline' for="c12">Yes</label>
												</div>
                                                <div class="check-line">
													<input type="radio" id="primary" class='icheck-me' name="primary" data-skin="square" data-color="orange" value="0" required>
													<label class='inline' for="c12">No</label>
												</div>
                <span class="help-block">
                                                                                    <code>This task is high level and will form part of the activity milestone and will be reported against at the activity update level.</code>
                                                                                    </span>
                 
					
				</div>
			</div>
                                        
                                        
                            
                                        <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Status</label>
                                            <div class="col-sm-10">
                                            
                                            <select name="status" id="status" class='form-control'>
                                                <option value="Active" <?php if(set_value('status')=="Active"){ echo 'selected="selected"';}?>>Active</option>
                                                <option value="Innactive" <?php if(set_value('status')=="Innactive"){ echo 'selected="selected"';}?>>Innactive</option>
                                            </select>
                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Progress</label>
                                            <div class="col-sm-10">
                                                <select name="progress" id="progress" class='form-control'>
                                                <option value="0" <?php if(set_value('progress')=="0"){ echo 'selected="selected"';}?>>0%</option>
                                                <option value="5" <?php if(set_value('progress')=="5"){ echo 'selected="selected"';}?>>5%</option>
                                                <option value="10" <?php if(set_value('progress')=="10"){ echo 'selected="selected"';}?>>10%</option>
                                                <option value="15" <?php if(set_value('progress')=="15"){ echo 'selected="selected"';}?>>15%</option>
                                                <option value="20" <?php if(set_value('progress')=="20"){ echo 'selected="selected"';}?>>20%</option>
                                                <option value="25" <?php if(set_value('progress')=="25"){ echo 'selected="selected"';}?>>25%</option>
                                                <option value="30" <?php if(set_value('progress')=="30"){ echo 'selected="selected"';}?>>30%</option>
                                                <option value="35" <?php if(set_value('progress')=="35"){ echo 'selected="selected"';}?>>35%</option>
                                                <option value="40" <?php if(set_value('progress')=="40"){ echo 'selected="selected"';}?>>40%</option>
                                                <option value="45" <?php if(set_value('progress')=="45"){ echo 'selected="selected"';}?>>45%</option>
                                                <option value="50" <?php if(set_value('progress')=="50"){ echo 'selected="selected"';}?>>50%</option>
                                                <option value="55" <?php if(set_value('progress')=="55"){ echo 'selected="selected"';}?>>55%</option>
                                                <option value="60" <?php if(set_value('progress')=="60"){ echo 'selected="selected"';}?>>60%</option>
                                                <option value="65" <?php if(set_value('progress')=="65"){ echo 'selected="selected"';}?>>65%</option>
                                                <option value="70" <?php if(set_value('progress')=="70"){ echo 'selected="selected"';}?>>70%</option>
                                                <option value="75" <?php if(set_value('progress')=="75"){ echo 'selected="selected"';}?>>75%</option>
                                                <option value="80" <?php if(set_value('progress')=="80"){ echo 'selected="selected"';}?>>80%</option>
                                                <option value="85" <?php if(set_value('progress')=="85"){ echo 'selected="selected"';}?>>85%</option>
                                                <option value="90" <?php if(set_value('progress')=="90"){ echo 'selected="selected"';}?>>90%</option>
                                                <option value="95" <?php if(set_value('progress')=="95"){ echo 'selected="selected"';}?>>95%</option>
                                                <option value="100" <?php if(set_value('progress')=="100"){ echo 'selected="selected"';}?>>100%</option>
                                            </select>
                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Priority</label>
                                            <div class="col-sm-10">
                                            
                                            <select name="priority" id="priority" class='form-control'>
                                                <option value="Low" <?php if(set_value('priority')=="Low"){ echo 'selected="selected"';}?>>Low</option>
                                                <option value="Medium" <?php if(set_value('priority')=="Medium"){ echo 'selected="selected"';}?>>Medium</option>
                                                 <option value="High" <?php if(set_value('priority')=="High"){ echo 'selected="selected"';}?>>High</option>
                                            </select>
                                                
                                            </div>
                                        </div>
                                        
									</div>
									<div class="tab-pane" id="second22">
                                    	                            
                                       <!-- <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Task type</label>
                                            <div class="col-sm-10">
                                            <select name="task_type" id="task_type" class='form-control'>
                                                <option value="Unknown" <?php if(set_value('task_type')=="Unknown"){ echo 'selected="selected"';}?>>Unknown</option>
                                                <option value="Administrative" <?php if(set_value('task_type')=="Administrative"){ echo 'selected="selected"';}?>>Administrative</option>
                                                 <option value="Operative" <?php if(set_value('task_type')=="Operative"){ echo 'selected="selected"';}?>>Operative</option>
                                            </select>
                                                
                                            </div>
                                        </div>-->
                            
                                        <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Parent task</label>
                                            <div class="col-sm-10">
                                            
                                             <div id="tasks">
                                             <select name="parent_id" id="parent_id" class='form-control'>
                                              <option value="0">None</option>
                                             
                                            </select>
                                             <!--<select name="parent_id" id="parent_id" class='form-control'>
                                             <option value="0">None</option>
                                                <?php
                                            foreach($rollingactionplans as $key=>$rollingactionplan)
                                            {
                                                ?>
                                                <option value="<?php echo $rollingactionplan['id'];?>" <?php if(set_value('parent_id')==$rollingactionplan['id']){ echo 'selected="selected"';}?>><?php echo $rollingactionplan['task_name'];?></option>
                                                <?php
                                            }
                                            ?>
                                            </select>-->
                                            
                                            </div>
                                            <span class="help-block">
                                                                                    <code>Is this task a sub task of another task?</code>
                                                                                    </span>
                                            </div>
                                        </div>
                            
                                        <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Target budget</label>
                                            <div class="col-sm-10">
                                                <?php 
                                                $data = array('id' => 'target_budget', 'name' => 'target_budget','class'=>'form-control','required'=>'required');
                                                echo form_input($data, set_value('target_budget'));
                                                ?>
                                            </div>
                                        </div>
                            
                                        <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Description</label>
                                            <div class="col-sm-10">
                                                <?php 
                                                $data = array('id' => 'description', 'name' => 'description','class'=>'form-control','required'=>'required');
                                                echo form_textarea($data, set_value('description'));
                                                ?>
                                            </div>
                                        </div>
                                    
                                    		
									</div>
									<div class="tab-pane" id="thirds3322">
										<div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Start date <small>yyyy-mm-dd</small></label>
                                            <div class="col-sm-10">
                                                <?php 
                                                $data = array('id' => 'start_date', 'name' => 'start_date','class'=>'form-control datepick','data-inputmask'=>"'mask': '9999-99-99'",'data-date-format'=>'yyyy-mm-dd','required'=>'required');
                                                echo form_input($data, set_value('start_date'));
                                                ?>
                                            </div>
                                        </div>
                                       <!-- <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Start time</label>
                                            <div class="col-sm-10">
                                                <?php 
                                                $data = array('id' => 'start_time', 'name' => 'start_time','class'=>'form-control','required'=>'required');
                                                echo form_input($data, set_value('start_time'));
                                                ?>
                                            </div>
                                        </div>-->
                            
                                        <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">End date <small>yyyy-mm-dd</small></label>
                                            <div class="col-sm-10">
                                                <?php 
                                                $data = array('id' => 'end_date', 'name' => 'end_date','class'=>'form-control datepick','data-inputmask'=>"'mask': '9999-99-99'",'data-date-format'=>'yyyy-mm-dd','required'=>'required');
                                                echo form_input($data, set_value('end_date'));
                                                ?>
                                            </div>
                                        </div>
                                        <!--<div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">End time</label>
                                            <div class="col-sm-10">
                                                <?php 
                                                $data = array('id' => 'end_time', 'name' => 'end_time','class'=>'form-control','required'=>'required');
                                                echo form_input($data, set_value('end_time'));
                                                ?>
                                            </div>
                                        </div>-->
                            
                                        
									</div>
									<div class="tab-pane" id="thirds33">
                                      <div class="form-group">
                                        <label for="textfield" class="control-label col-sm-2">Assign Task</label>
                                        <div class="col-sm-10">
										 <select multiple="multiple" id="user_id" name="user_id[]" class='multiselect' required="required">
                	
											<?php
                                            foreach($users as $key=>$user)
                                            {
                                                ?>
                                                <option value="<?php echo $user['id'];?>" ><?php echo $user['fname'];?> <?php echo $user['lname'];?></option>
                                                <?php
                                            }
                                            ?>
                                        
                                        </select>
                                        </div>
										</div>
                                        
                                        
									</div>
                                    
                                    <div class="tab-pane" id="fourth44">
										 <div class="form-group">
                                        <label for="textfield" class="control-label col-sm-2">Task Dependancies</label>
                                        <div class="col-sm-10">
                                        
                                         <a href="javascript:void(0)" title="" class="btn btn-success" style="margin: 5px;" onclick='refreshList(this)'>Refresh Dependancy Task List <i class="fa fa-refresh"></i></a>
                                       
                                       <div id="dependancies">
										<!-- <select multiple="multiple" id="dependancy_id" name="dependancy_id[]" class='multiselect'>
                	
											<?php
                                            foreach($rollingactionplans as $key=>$rollingactionplan)
                                            {
                                                ?>
                                                <option value="<?php echo $rollingactionplan['id'];?>" <?php if(set_value('parent_id')==$rollingactionplan['id']){ echo 'selected="selected"';}?>><?php echo $rollingactionplan['task_name'];?></option>
                                                <?php
                                            }
                                            ?>
                                        
                                        </select>-->
                                        </div>
                                        
                                        </div>
										</div>
									</div>
                                     <div class="tab-pane" id="fifth55">
										
                                        
                                        <table id="dataTable" class="table table-hover table-nomargin table-bordered">
                                        	<tbody>
                                             <tr><td><input id="moreDates" type="button" value="Add Milestone" class="btn btn-success" /></td></tr>
                                            <tr>
                                             
                                            </tbody>
                                                                      
                                         </table>
                                         
                                         <div id="importantDates">
                                         
                                         <table class="table table-hover table-nomargin table-bordered">
                                         <tr>
                                         <td>Milestone</td>
                                         <td><input type="text" name="milestone[]" id="milestone"  class="form-control"></td>
                                         <td>Date</td><td><input class="myDate" type="text" name="milestone_date[]" size="10" value="" data-date-format="yyyy-mm-dd"/></td>
                                         </tr>
                                         </table>
                                         
                                      
                                    
                                         
                                         <div class="myTemplate" style="display:none">
                                         
                                         <table class="table table-hover table-nomargin table-bordered">
                                         <tr>
                                         <td>Milestone</td>
                                         <td><input type="text" name="milestone[]" id="milestone"  class="form-control"></td>
                                         <td>Date</td><td><input class="myDate" type="text" name="milestone_date[]" size="10" value="" data-inputmask="'mask': '9999-99-99'" data-date-format="yyyy-mm-dd"/></td>
                                         </tr>
                                         </table>
                                          </div>
                                            
                                         </div>
                                         
                                         
                                         
                                         
                                         </div>
                                        
                                        
									</div>
                                    
								</div>
							</div>
                    
			

			
			
					<div class="form-actions col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">SAVE ENTRY</button>
					</div>
				<?php echo form_close(); ?>
 			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>

</body>
</html>
