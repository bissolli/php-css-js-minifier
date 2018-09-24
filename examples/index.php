<?php

require __DIR__ . '/../vendor/autoload.php';

$minifier = new \Bissolli\PhpMinifier\Minifier();

$minifier->addCssFile('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-reboot.css');
$minifier->addCssFile('./data/style1.css');
$minifier->addCssFile('/Users/gustavobissolli/Code/php-css-js-minifier/examples/data/style2.css');
//$minifier->addCssFile('/{FULL_PATH}/php-css-js-minifier/examples/data/style2.css');

$minifier->addJsFile('./data/script1.js');
$minifier->addJsFile('/Users/gustavobissolli/Code/php-css-js-minifier/examples/data/script2.js');
//$minifier->addJsFile('/{FULL_PATH}/php-css-js-minifier/examples/data/script2.js');

$output = $minifier->minify()->output('./', 'app.min');

echo "<pre>";
var_export($output);
echo "</pre>";
