<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 14.10.14
 * Time: 21:09
 */

require_once 'Base.php';

class PHPXSLTParse extends Base implements IParse
{
    private $xml;
    private $xsl;
    private $proc;
    private $dom;

    /**
     * @overwrite
     * @inheritdoc
     */
    public function fetch()
    {
        $this->fetchXml();
        $this->fetchXsl();
        return $this;
    }

    /**
     * @overwrite
     * @inheritdoc
     */
    public function parse()
    {
        $this->proc = new XSLTProcessor;
        $this->proc->importStyleSheet($this->xsl); // добавление стилей xsl
        $this->dom = $this->proc->transformToDoc($this->xml);
        return $this;
    }

    /**
     * @overwrite
     * @inheritdoc
     */
    public function getResult()
    {
        $html = $this->dom->saveHTML();
        return $html;
    }

    /**
     * Получение XML
     * @return mixed
     */
    private function fetchXml()
    {
        $this->xml = new DOMDocument;
        return $this->xml->load(Config::get('url')['xml']);
    }

    /**
     * Получение XSL
     * @return mixed
     */
    private function fetchXsl()
    {
        $this->xsl = new DOMDocument;
        return $this->xsl->load(Config::get('url')['xsl']);
    }
}