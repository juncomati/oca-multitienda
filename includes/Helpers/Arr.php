<?php
namespace Makers\OcaMultitienda\Helpers; if(!defined('ABSPATH')){exit;} class Arr{public static function get($a,$k,$d=null){return is_array($a)&&array_key_exists($k,$a)?$a[$k]:$d;}}