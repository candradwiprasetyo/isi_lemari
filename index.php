<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>.: Amanah Shop :.</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="web/css/form.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="web/js/jquery1.min.js"></script>
<!-- start menu -->
<link href="web/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="web/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!--start slider -->
    <link rel="stylesheet" href="web/css/fwslider.css" media="all">
    <script src="web/js/jquery-ui.min.js"></script>
    <script src="web/js/css3-mediaqueries.js"></script>
    <script src="web/js/fwslider.js"></script>
<!--end slider -->
<script src="web/js/jquery.easydropdown.js"></script>
<script type="text/javascript" src="web/js/jquery.flexisel.js"></script>

<script type="text/javascript" src="web/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- start details -->
<script src="web/js/slides.min.jquery.js"></script>
   <script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
	<!-- start zoom -->
	<link rel="stylesheet" href="web/css/zoome-min.css" />
	<script type="text/javascript" src="web/js/zoome-e.js"></script>
	<script type="text/javascript">
		$(function(){
		$('#img1,#img2,#img3,#img4').zoome({showZoomState:true,magnifierSize:[250,250]});
	});
	</script>		
</head>
<body>
    
<?php include 'page/header_bottom.php'; ?>

<?php 
$page = (isset($_GET['page'])) ? $_GET['page'] : "";
if($page == "page/home" || $page == "" ){
	include 'page/slider.php'; 
}
?>
<div class="main">
	<div class="wrap">
		
			  <?php
     
          
		  
						  if($page){
							require_once($page.".php");
						  } else {
						
						  	require_once("page/home.php");
						  }
						?>
		
	</div>
</div>
    
   <div class="footer">
		<?php include 'page/footer_top.php'; ?>
		<?php //include 'page/footer_middle.php'; ?>
		<?php //include 'page/footer_bottom.php'; ?>
	</div>
</body>
</html>