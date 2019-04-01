<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="author" content="">
		<meta name="robots" content="all">
		<?php
			header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
			header("Cache-Control: post-check=0, pre-check=0", false);
			header("Pragma: no-cache");
			$meta_rec = $this->meta_info;
			//dd($meta_rec);
			if (is_array($meta_rec) && !empty($meta_rec)) {
				?>
				<title><?= $meta_rec['meta_title'] ?></title>
				<meta name="description" content="<?php echo $meta_rec['meta_description']; ?>" />
				<meta name="keywords" content="<?php echo $meta_rec['meta_keyword']; ?>" />
				<?php
			}
		?>

		<link rel="shortcut icon" href="<?php echo theme_url(); ?>images/favicon.ico" type="image/x-icon">
		<!-- Bootstrap Core CSS -->
		<script type="text/javascript">
			var site_url = '<?php echo site_url(); ?>';
			var theme_url = '<?php echo theme_url(); ?>';
			var resource_url = '<?php echo resource_url(); ?>';
		</script>

		<!-- Customizable CSS -->
		<link rel="stylesheet" href="<?php echo theme_url(); ?>css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo theme_url(); ?>css/animate.css">
		<link rel="stylesheet" href="<?php echo theme_url(); ?>js/owl.carousel/owl.carousel.css">
		<link rel="stylesheet" href="<?php echo theme_url(); ?>js/owl.carousel/owl.theme.css">
		<link rel="stylesheet" href="<?php echo theme_url(); ?>css/nivo-slider.css">
		<link href="<?php echo theme_url(); ?>js/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo theme_url(); ?>css/stec.css?v=<?= time() ?>">
		<link rel="stylesheet" href="<?php echo theme_url(); ?>css/responsive.css">
		<script type="text/javascript" src="<?php echo theme_url(); ?>js/jquery.min.js"></script>
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="<?php echo theme_url(); ?>css/font-awesome.min.css">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<!-- Global site tag (gtag.js) - Google Analytics -->
	</head>



	<?php
		if ($this->router->fetch_method() != 'login') {
			$this->load->view('project_header');
		}
	?>