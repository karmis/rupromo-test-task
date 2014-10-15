<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 14.10.14
 * Time: 20:42
 */
require_once 'parsers/PHPParser.php';
require_once 'parsers/PHPXSLTParser.php';
require_once 'parsers/JSParser.php';

class TestTask
{
    public function __construct($request)
    {
        $type = strtolower($request['type']);
        if ($type == 'php') {
            $parser = new PHPParse();
        } elseif($type == 'phpxlst') {
            $parser = new PHPXSLTParse();

        } elseif($type == 'js') {
            $parser = new JSParser();
        } else {
            exit(1);
        }

        echo($parser->fetch()->parse()->getResult());
        exit();

    }
}

new TestTask($_POST);