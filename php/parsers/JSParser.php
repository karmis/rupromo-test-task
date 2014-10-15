<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 15.10.14
 * Time: 5:06
 */
require_once 'Base.php';
class JSParser extends Base implements IParse {

    private $string;

    /**
     * @overwrite
     * @inheritdoc
     */
    public function fetch()
    {
        $this->string = file_get_contents(Config::get('url')['xml']);
        return $this;
    }

    /**
     * @overwrite
     * @inheritdoc
     */
    public function parse()
    {

        return $this;
    }

    /**
     * @overwrite
     * @inheritdoc
     */
    public function getResult()
    {
        return $this->string;
    }
} 