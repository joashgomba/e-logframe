<?php include(APPPATH . 'views/common/head.php'); ?>
<body class='error'>
	<div class="wrapper">
		<div class="code">
			<span>404</span>
			<i class="fa fa-warning"></i>
		</div>
		<div class="desc">Oops! Sorry, that page could'nt be found.</div>
		<form action="" class='form-horizontal'>
			<div class="input-group">
				<input type="text" name="search" placeholder="Search a site.." class='form-control'>
				<span class="input-group-btn">
					<button type='submit' class='btn'>
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<div class="buttons">
			<div class="pull-left">
				<a href="<?php echo site_url('home')?>" class="btn btn--icon">
					<i class="fa fa-arrow-left"></i>Back</a>
			</div>
		</div>
	</div>

</body>

s</html>
