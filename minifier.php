<?php
	function minifyJS($arr, $output){
		minify($arr, $output, 'https://javascript-minifier.com/raw');
	}

	function minifyCSS($arr, $output){
		minify($arr, $output, 'https://cssminifier.com/raw');
	}

	function minify($arr, $output, $url) {
		$content = "";
		foreach ($arr as $value) {
            $content .= "\n". file_get_contents($value) . "\n";
		}

		$minifiedContent = getMinified($url, $content);

		$handler = fopen($output, 'w') or die("File <a href='" . $output . "'>" . $output . "</a> error!<br />");
		fwrite($handler, $minifiedContent);
		fclose($handler);

		echo "File <a href='" . $output . "'>" . $output . "</a> done!<br />";
	}

	function getMinified($url, $content) {
		$postdata = array('http' => array(
	        'method'  => 'POST',
	        'header'  => 'Content-type: application/x-www-form-urlencoded',
	        'content' => http_build_query( array('input' => $content) ) ) );
		return file_get_contents($url, false, stream_context_create($postdata));
	}
?>
