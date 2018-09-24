<?php

namespace Bissolli\PhpMinifier;

use Bissolli\PhpMinifier\Traits\MinifierGettersTrait;

abstract class MinifierAbstract
{
    use MinifierGettersTrait;

    /**
     * Array with paths of CSS files
     *
     * @var Array
     */
    protected $cssFiles = [];

    /**
     * Array with paths of JS files
     *
     * @var Array
     */
    protected $jsFiles = [];

    /**
     * Service link to get the minified CSS files
     *
     * @var String
     */
    protected $cssServiceLink = null;

    /**
     * Service link to get the minified JS files
     *
     * @var String
     */
    protected $jsServiceLink = null;

    /**
     * CSS minified content
     *
     * @var String
     */
    protected $cssMinified = null;

    /**
     * JS minified content
     *
     * @var String
     */
    protected $jsMinified = null;

    /**
     * Add path of files to the list of JS Files
     *
     * @param String|Array $files
     * @return Minifier
     * @throws \Exception
     */
    public function addJsFile($files)
    {
        $this->addFiles('jsFiles', $files);

        return $this;
    }

    /**
     * Add path of files to the list of CSS Files
     *
     * @param String|Array $files
     * @return Minifier
     * @throws \Exception
     */
    public function addCssFile($files)
    {
        $this->addFiles('cssFiles', $files);

        return $this;
    }

    /**
     * Add path of files to the given list of files
     *
     * @param String $var
     * @param String|Array $files
     * @throws \Exception
     */
    protected function addFiles($var, $files)
    {
        if (is_array($files)) {
            $this->{$var} = array_merge($this->{$var}, $files);
        } else if (is_string($files)) {
            array_push($this->{$var}, $files);
        } else {
            throw new \Exception('Invalid data given. Expect to be array or string.');
        }

        array_unique($this->{$var});
    }

    /**
     * Merge and minify list of CSS files
     *
     * @return $this
     */
    public function minifyCss()
    {
        $this->cssMinified = $this->mergeAndMinify($this->cssFiles, $this->cssServiceLink);

        return $this;
    }

    /**
     * Merge and minify list of JS files
     *
     * @return $this
     */
    public function minifyJs()
    {
        $this->jsMinified = $this->mergeAndMinify($this->jsFiles, $this->jsServiceLink);

        return $this;
    }

    /**
     * Merge and minify list of CSS and JS files
     *
     * @return $this
     */
    public function minify()
    {
        $this->minifyCss();
        $this->minifyJs();

        return $this;
    }

    /**
     * Merge and minify list of given files
     *
     * @param $files
     * @param $serviceLink
     * @return null|string
     */
    protected function mergeAndMinify($files, $serviceLink)
    {
        if (count($files) === 0) {
            return null;
        }

        $content = "";

        foreach ($files as $value) {
            $content .= "\n". file_get_contents($value) . "\n";
        }

        return $this->callService($serviceLink, $content);
    }

    /**
     * Create a file with the minified CSS content
     *
     * @param $outputFile
     * @return $this
     * @throws \Exception
     */
    public function outputCss($outputFile)
    {
        $this->createFile($outputFile, $this->cssMinified);

        return $outputFile;
    }

    /**
     * Create a file with the minified JS content
     *
     * @param $outputFile
     * @return $this
     * @throws \Exception
     */
    public function outputJs($outputFile)
    {
        $this->createFile($outputFile, $this->jsMinified);

        return $outputFile;
    }

    /**
     * Create and write file on the given path
     *
     * @param $output
     * @param $content
     * @return void
     * @throws \Exception
     */
    protected function createFile($output, $content)
    {
        $file = fopen($output, 'w');

        if (!$file) {
            throw new \Exception('File open failed.');
        }

        fwrite($file, $content);
        fclose($file);
    }

    /**
     * Create a file with the minified CSS and JS content
     *
     * @param $outputFolderPath
     * @param string $outputFileName
     * @return array
     * @throws \Exception
     */
    public function output($outputFolderPath, $outputFileName = 'app.min')
    {
        $outputBaseFileName = rtrim($outputFolderPath, '/') . DIRECTORY_SEPARATOR . $outputFileName;

        $outputFileNames = [
            'css' => $outputBaseFileName . '.css',
            'js' => $outputBaseFileName . '.js'
        ];

        $this->outputCss($outputFileNames['css']);
        $this->outputJs($outputFileNames['js']);

        return $outputFileNames;
    }

    /**
     * Call the external service to minify the content
     *
     * @param $url
     * @param $content
     * @return bool|string
     */
    protected function callService($url, $content) {
        $postdata = [
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query(['input' => $content])
            ]
        ];

        return file_get_contents($url, false, stream_context_create($postdata));
    }
}
