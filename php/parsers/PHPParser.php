<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 14.10.14
 * Time: 20:45
 */
require_once 'Base.php';

class PHPParse extends Base implements IParse
{
    private $xml;
    private $html;

    /**
     * @overwrite
     * @inheritdoc
     */
    public function fetch()
    {
        $this->xml = new domDocument("1.0", "utf-8");
        $this->xml->preserveWhiteSpace = false;
        $string = file_get_contents(Config::get('url')['xml']);
        $this->xml->loadXML(($string));

        return $this;
    }

    /**
     * @overwrite
     * @inheritdoc
     */
    public function parse()
    {
        $root = $this->xml->documentElement;
        $html = "";
//        $childs = $root->childNodes;
        foreach($root->getElementsByTagName('item') as $item){
//            $item = $childs->item($i);
            $id = $item->getAttribute('id');
            $val = $item->nodeValue;
            $link = $item->getAttribute('link');
            $html.='<li id="'.$id.'"><a href="'.$link.'">'.$val.'</a></li>';
        }

        $this->html = "<ul id='menu'>".$html."</ul>";

        return $this;
    }

    /**
     * @overwrite
     * @inheritdoc
     */
    public function getResult()
    {
        return $this->html;
    }
} 