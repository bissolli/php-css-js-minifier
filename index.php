<body>
<?php
	include_once("minifier.php");

	$js = [
		"../js/jquery.js",
		"../js/scripts.js",
    	];

	$css = [
        	"../css/bootstrap.css",
	        "../css/style.css",
    	];

	minifyJS($js, '../js/app.min.js');
	minifyCSS($css, '../css/app.min.css');
?>
</body>
