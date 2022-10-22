<?php

namespace Bissolli\PhpMinifier;

class Minifier extends MinifierAbstract
{
    /**
     * Service link to get the minified CSS files
     *
     * @var String
     */
    protected $cssServiceLink = 'https://www.toptal.com/developers/cssminifier/api/raw';

    /**
     * Service link to get the minified JS files
     *
     * @var String
     */
    protected $jsServiceLink = 'https://www.toptal.com/developers/javascript-minifier/api/raw';
}
