<?php
namespace Makers\OcaMultitienda\Helpers; if(!defined('ABSPATH')){exit;} class Sanitizer{public static function text($v){return sanitize_text_field($v);} }