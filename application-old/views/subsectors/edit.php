<?php include(APPPATH . 'views/common/head.php'); ?>
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
							<a href="<?php echo base_url() ?>index.php/subsectors">Sub sectors</a>
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
					<?php echo form_open('subsectors/edit_validate/'.$row->id,$attributes); ?>
			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Sub sector</label>
				<div class="col-sm-10">
					<?php 
					$data = array('id' => 'sub_sector', 'name' => 'sub_sector', 'value' => $row->sub_sector, 'class'=>'form-control','required'=>'required');
 					echo form_input($data, set_value('sub_sector'));
					?>
				</div>
			</div>

			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Sector </label>
				<div class="col-sm-10">
                <select name="sector_id" id="sector_id" class="form-control">
                                                    <?php
                                                        foreach($sectors as $key=>$sector)
                                                        {
                                                            ?>
                                                            <option value="<?php echo $sector['id'];?>" <?php if($row->sector_id==$sector['id']){echo 'selected="selected"';}?>><?php echo $sector['sector'];?></option>
                                                            <?php
                                                        }
                                                        ?>
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

</body>
</html>
