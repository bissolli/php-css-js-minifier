<body>
<?php
	include_once("minifier.php");

	$js = [
	    "../js/jquery.min.js",
        "../js/bootstrap.min.js",
        "../js/jquery.waypoints.min.js" ,
        "../js/jquery.magnific-popup.min.js",
        "../js/owl.carousel.min.js",
        "../js/sweetalert2.min.js",
        "../js/parsley.min.js",
        "../js/theme.js",
    ];

	$css = [
        "../css/bootstrap.min.css",
        "../css/bootstrap.min.css",
        "../css/font-awesome.min.css",
        "../css/magnific-popup.min.css",
        "../css/owl.carousel.min.css",
        "../css/sweetalert2.min.css",
        "../css/preset.min.css",
        "../css/scroll-animation.min.css",
        "../css/style.css",
    ];

	minifyJS($js, '../js/app.min.js');
	minifyCSS($css, '../css/app.min.css');
?>
</body>
