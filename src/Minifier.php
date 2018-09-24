<?php

namespace Bissolli\PhpMinifier;

class Minifier extends MinifierAbstract
{
    /**
     * Service link to get the minified CSS files
     *
     * @var String
     */
    protected $cssServiceLink = 'https://cssminifier.com/raw';

    /**
     * Service link to get the minified JS files
     *
     * @var String
     */
    protected $jsServiceLink = 'https://javascript-minifier.com/raw';
}
