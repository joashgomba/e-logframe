<?php include(APPPATH . 'views/common/header.php'); ?>
<style>
/* Make Table Responsive --- */
@media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px)  {
.display table, .display thead, .display th, .display tr, .display td {
display: block;
}
/* Hide table headers (but not display:none, for accessibility) */
.display thead tr {
position: absolute;
top: -9999px;
left: -9999px;
}
.display tr {
border: 1px solid #ccc;
}
.display td {
/* Behave like a row */
border: none;
padding-left: 50%;
border-bottom: 1px solid #eee;
position: relative;
}
.display td:before {
/* Now, like a table header */
/**position: absolute;**/
/* Top / left values mimic padding */
top: 6px; left: 6px;
width: 45%;
padding-right: 10px;
font-weight:bold;
white-space: nowrap;
}
/* -- LABEL THE DATA -- */
.display td:nth-of-type(1):before { content: "Id"; }
.display td:nth-of-type(2):before { content: "Fname"; }
.display td:nth-of-type(3):before { content: "Lname"; }
.display td:nth-of-type(4):before { content: "Institution"; }
.display td:nth-of-type(5):before { content: "Email"; }
.display td:nth-of-type(6):before { content: "Conact number"; }
.display td:nth-of-type(7):before { content: "Username"; }
.display td:nth-of-type(8):before { content: "Active"; }
.display td:nth-of-type(9):before { content: "Actions"; }
 
}/* End responsive query */

</style>

<body>
		<?php include(APPPATH . 'views/common/navbar.php'); ?>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>
			<?php include(APPPATH . 'views/common/sidebar.php'); ?>
			
			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="<?php echo site_url('home')?>">Home</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>

						<li class="active">Users</li>
					</ul><!--.breadcrumb-->

					
				</div>

				<div class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
                            <div class="page-header position-relative">
						<h1>
							Management
							<small>
								<i class="icon-double-angle-right"></i>
								Users
							</small>
						</h1>
					</div><!--/.page-header-->
                    <p>
                    <a href="<?php echo base_url() ?>index.php/users/add" class="btn btn-app btn-primary no-radius">
										<i class="icon-edit bigger-230"></i>
										Add
										
									</a>
                    </p>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
<thead>
<tr>
<th>Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Contact Number</th>
<th>Username</th>
<th>Active</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach ($rows->result() as $row): ?>
<tr>
<td><?php echo $row->user_id; ?></td>
<td><?php echo $row->fname; ?></td>
<td><?php echo $row->lname; ?></td>
<td><?php echo $row->user_email; ?></td>
<td><?php echo $row->contact_number; ?></td>
<td><?php echo $row->username; ?></td>
<td><?php 
if($row->active==1)
{
	echo 'Yes';
}
else
{
	echo 'No';
}?></td>
<td><a href="<?php echo base_url() ?>index.php/users/edit/<?php echo $row->id; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">	<span class="green">
																		<i class="icon-edit bigger-120"></i>
																	</span>
																</a>&nbsp;&nbsp;
                                                                <a href="<?php echo base_url() ?>index.php/users/delete/<?php echo $row->id; ?>" class="tooltip-error" data-rel="tooltip" title="Delete" onClick="return confirm('Are you sure you want to delete? This action is not reversable')">
                                                                <span class="red">
																		<i class="icon-trash bigger-120"></i>
																	</span>
                                                                </a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
			<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

				<?php include(APPPATH . 'views/common/settingscontainer.php'); ?>
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<?php include(APPPATH . 'views/common/footer.php'); ?>
	</body>
</html>