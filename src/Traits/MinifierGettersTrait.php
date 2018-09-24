<?php

namespace Bissolli\PhpMinifier\Traits;

trait MinifierGettersTrait
{
    /**
     * Get list of CSS files
     *
     * @return Array
     */
    public function getCssFiles()
    {
        return $this->cssFiles;
    }

    /**
     * Get list of JS files
     *
     * @return Array
     */
    public function getJsFiles()
    {
        return $this->jsFiles;
    }
}
