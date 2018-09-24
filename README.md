# PHP Css/Js Minifier

[![Build Status](https://travis-ci.org/bissolli/php-css-js-minifier.svg?branch=master)](https://travis-ci.org/bissolli/php-css-js-minifier)
[![Latest Stable Version](https://poser.pugx.org/bissolli/php-css-js-minifier/v/stable)](https://packagist.org/packages/bissolli/php-css-js-minifier)
[![Total Downloads](https://poser.pugx.org/bissolli/php-css-js-minifier/downloads)](https://packagist.org/packages/bissolli/php-css-js-minifier)
[![License](https://poser.pugx.org/bissolli/php-css-js-minifier/license)](https://packagist.org/packages/bissolli/php-css-js-minifier)

Composer package to merge and minify a list of Js and Css files.

## Installation

### Using composer
```sh
composer require bissolli/php-css-js-minifier
```

### If you don't have composer
You can download it [here](https://getcomposer.org/download/).

## Code Example
Instantiate the class:
```php
$minifier = new \Bissolli\PhpMinifier\Minifier();
```

Add all the paths of **css** files that you wish to merge and minify:
```php
// You can load external assets
$minifier->addCssFile('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-reboot.css');

// Use relative path to add the file
$minifier->addCssFile('./data/style1.css');

// Full path is also accepted
$minifier->addCssFile('/{FULL_PATH}/php-css-js-minifier/examples/data/style2.css');

// Array is also allowed
$minifier->addCssFile([
    'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-reboot.css',
    './data/style1.css',
    '/{FULL_PATH}/php-css-js-minifier/examples/data/style2.css'
]);
```

Add all the paths of **js** files that you wish to merge and minify:
```php
// As CSS files, you can load full path, relative and external links.
// Array is also allowed
$minifier->addJsFile('./data/script1.js');
$minifier->addJsFile('/{FULL_PATH}/php-css-js-minifier/examples/data/script2.js');
```

> **NOTE:** You don't need to add Css AND Js files at the same time, it's possible to add only Css or Js files if needed.

Once all the files are added, let's merge and minify all of them:
```php
// Minify and save css and js files
// Output: ./app.min.css & ./app.min.js
$output = $minifier->minify()->output('./', 'app.min');

// Working with Css only
$output = $minifier->minifyCss()->outputCss('./app.min.css');

// Working with Js only
$output = $minifier->minifyJs()->outputJs('./app.min.js');
```

## License
Released under the [MIT license](http://www.opensource.org/licenses/MIT)

## Thanks
 - [CSS Minifier](https://cssminifier.com)
 - [JavaScript Minifier](https://javascript-minifier.com)
