<?php include(APPPATH . 'views/common/head.php'); ?>
<script>
$(document).ready(function() {

	$('input[id=password]').keyup(function() {
		// set password variable
		var pswd = $(this).val();
		//validate the length
		if ( pswd.length < 8 ) {
			$('#length').removeClass('valid').addClass('invalid');
		} else {
			$('#length').removeClass('invalid').addClass('valid');
		}
		//validate letter
		if ( pswd.match(/[A-z]/) ) {
			$('#letter').removeClass('invalid').addClass('valid');
		} else {
			$('#letter').removeClass('valid').addClass('invalid');
		}
		
		//validate capital letter
		if ( pswd.match(/[A-Z]/) ) {
			$('#capital').removeClass('invalid').addClass('valid');
		} else {
			$('#capital').removeClass('valid').addClass('invalid');
		}
		
		//validate number
		if ( pswd.match(/\d/) ) {
			$('#number').removeClass('invalid').addClass('valid');
		} else {
			$('#number').removeClass('valid').addClass('invalid');
		}
	}).focus(function() {
		$('#pswd_info').show();
	}).blur(function() {
		$('#pswd_info').hide();
	});

});
</script>

<style>
form ul li {
    margin:10px 20px;

}
form ul li:last-child {
    text-align:center;
    margin:20px 0 25px 0;
}
#pswd_info {
    position:absolute;
    bottom:-75px;
    bottom: -115px\9; /* IE Specific */
    right:55px;
    width:250px;
    padding:15px;
    background:#fefefe;
    font-size:.875em;
    border-radius:5px;
    box-shadow:0 1px 3px #ccc;
    border:1px solid #ddd;
}

#pswd_info h4 {
    margin:0 0 10px 0;
    padding:0;
    font-weight:normal;
}

#pswd_info::before {
    content: "\25B2";
    position:absolute;
    top:-12px;
    left:45%;
    font-size:14px;
    line-height:14px;
    color:#ddd;
    text-shadow:none;
    display:block;
}

.invalid {
   
    padding-left:22px;
    line-height:24px;
    color:#ec3f41;
}
.valid {
    
    padding-left:22px;
    line-height:24px;
    color:#3a7d34;
}

#pswd_info {
    display:none;
}

</style>

 <script type="text/javascript"><!--
var lastDiv = "";
function showDiv(divName) {
	// hide last div
	if (lastDiv) {
		document.getElementById(lastDiv).className = "hiddenDiv";
	}
	//if value of the box is not nothing and an object with that name exists, then change the class
	if (divName && document.getElementById(divName)) {
		document.getElementById(divName).className = "visibleDiv";
		lastDiv = divName;
	}
}
//-->
</script>
		<style type="text/css" media="screen"><!--
.hiddenDiv {
	display: none;
	}
.visibleDiv {
	display: block;
	
	}

--></style>
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
							<a href="<?php echo base_url() ?>index.php/users">users</a>
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
					<?php $attributes = array('name' => 'frm', 'id'=>'frm','enctype' => 'multipart/form-data', 'class'=>'form-horizontal form-striped');?>
					<?php echo form_open('users/edit_validate/'.$row->id,$attributes); ?>
			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">First Name</label>
				<div class="col-sm-10">
					<?php 
					$data = array('id' => 'fname', 'name' => 'fname', 'value' => $row->fname, 'class'=>'form-control','required'=>'required');
 					echo form_input($data, set_value('fname'));
					?>
				</div>
			</div>

			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Last Name</label>
				<div class="col-sm-10">
					<?php 
					$data = array('id' => 'lname', 'name' => 'lname', 'value' => $row->lname, 'class'=>'form-control','required'=>'required');
 					echo form_input($data, set_value('lname'));
					?>
				</div>
			</div>

			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Designation</label>
				<div class="col-sm-10">
					<?php 
					$data = array('id' => 'designation', 'name' => 'designation', 'value' => $row->designation, 'class'=>'form-control','required'=>'required');
 					echo form_input($data, set_value('designation'));
					?>
				</div>
			</div>

			<div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Organization</label>
                                            <div class="col-sm-10">
                                            <select name="organization_id" id="organization_id" required="required" class='form-control'>
                                           
                                           <?php foreach ($organizations->result() as $organization): ?>
                                           <option value="<?php echo $organization->id;?>" <?php if($organization->id==$row->organization_id){ echo 'selected="selected"';}?>><?php echo $organization->organization_name;?> </option>
                                           <?php endforeach; ?>
                                            </select>
                                                
                                            </div>
                                        </div>
                                        
           <div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Country</label>
				<div class="col-sm-10">
					<select name="country_id" id="country_id" class="form-control" required="required" onChange="showDiv(this.value);">
                
                    <?php
					foreach($countries as $key=>$country)
					{
						?>
                        <option value="<?php echo $country['id'];?>" <?php if($row->country_id==$country['id']){ echo 'selected="selected"';}?>><?php echo $country['country'];?></option>
                        <?php
					}
					?>
                    
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Regions/Districts <span class="help-block">
                                                                                    <code>Select the country to get the user'sregion and district</code>
                                                                                </span></label>
				<div class="col-sm-10">
                
                
                <?php
				foreach($countries as $key=>$country)
				{
					?>
                    
                    
                    
                    <div id="<?php echo $country['id'];?>" class="hiddenDiv">
                    
                   
                    <span class="help-block">
                                                                                    <code>Region</code>
                                                                                </span>
                    <select id="county_id" name="county_id" class='form-control' >
                   
                   <?php
				   $thecounties = $this->countiesmodel->get_list_by_country($country['id']);
				   foreach($thecounties as $key=>$thecounty)
					{
						?>
                        <option value="<?php echo $thecounty['id'];?>" <?php if($row->county_id==$thecounty['id']){ echo 'selected="selected"';}?> ><?php echo $thecounty['county'];?></option>
                        <?php
					}
				   ?>
                   </select>
                   <span class="help-block">
                                                                                    <code>District</code>
                                                                                </span>
                   <select id="district_id" name="district_id" class='form-control' >
                	
                	<?php
					$districts = $this->districtsmodel->get_by_country($country['id']);
					foreach($districts as $key=>$district)
					{
						?>
                        <option value="<?php echo $district->id;?>" <?php if($row->district_id==$district->id){ echo 'selected="selected"';}?>><?php echo $district->district;?></option>
                        <?php
					}
					?>
                
                </select>
                   
                    </div>
                    <?php
				}
				?>
                
					
				</div>
			</div>
           <div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Contact number</label>
				<div class="col-sm-10">
					<?php 
					$data = array('id' => 'contact_number', 'name' => 'contact_number', 'value' => $row->contact_number, 'class'=>'form-control','required'=>'required');
 					echo form_input($data, set_value('contact_number'));
					?>
				</div>
			</div>

			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Email</label>
				<div class="col-sm-10">
					<?php 
					$data = array('id' => 'email', 'name' => 'email', 'value' => $row->email, 'class'=>'form-control','required'=>'required', 'type'=>'email');
 					echo form_input($data, set_value('email'));
					?>
				</div>
			</div>

			<!--<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Username</label>
				<div class="col-sm-10">
					<?php 
					$data = array('id' => 'username', 'name' => 'username', 'value' => $row->username, 'class'=>'form-control','required'=>'required');
 					echo form_input($data, set_value('username'));
					?>
				</div>
			</div>-->

			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Password (if changing)</label>
				<div class="col-sm-10">
					<?php 
					$data = array('id' => 'password', 'name' => 'password', 'class'=>'form-control','type'=>'password', 'title'=>'Password must contain at least 8 characters, including UPPER/lowercase and numbers.', 'pattern'=>'(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}', 'type'=>'password');
 					echo form_input($data, set_value('password'));
					?>
                    <input type="hidden" name="oldpassword" id="oldpassword" value="<?php echo $row->password;?>" />
                    <input type="hidden" name="oldsalt" id="oldsalt" value="<?php echo $row->salt;?>" />
				</div>
			</div>
            
             <div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Confirm Password</label>
				<div class="col-sm-10">
					<?php 
					$data = array('id' => 'pswdconf', 'name' => 'pswdconf','class'=>'form-control', 'title'=>'Please enter the same Password as above.', 'pattern'=>'(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}', 'type'=>'password');
 					echo form_input($data, set_value('pswdconf'));
					?>
                    
				</div>
                
			</div>

			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Role</label>
				<div class="col-sm-10">
					<select name="role_id" id="role_id" class="form-control">
					<?php
                    foreach($roles as $key => $role)
                    {
                        ?>
                        <option value="<?php echo $role['id'];?>" <?php if($role['id']==$row->role_id){ echo 'selected="selected"';}?> ><?php echo $role['description'];?></option>
                        <?php
                    }
                    ?>
                    </select>
				</div>
			</div>

			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Active</label>
				<div class="col-sm-10">
					<select name="active" id="active" class="form-control">
                        <option value="1" <?php if($row->active==1){ echo 'selected="selected"';}?>>Yes</option>
                        <option value="0" <?php if($row->active==0){ echo 'selected="selected"';}?>>No</option>
                    </select>
				</div>
			</div>

					<div class="form-actions col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">UPDATE CHANGES</button>
					</div>
				<?php echo form_close(); ?>
 			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>


 <div id="pswd_info">
                <h4>Password must meet the following requirements:</h4>
                <ul>
                    <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                    <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                    <li id="number" class="invalid">At least <strong>one number</strong></li>
                    <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                </ul>
                </div>
    </div>
    
    
</body>
</html>
