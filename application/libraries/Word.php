<?php 
/*if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/third_party/PHPWord.php"; 

class Word extends PHPWord { 
    public function __construct() { 
        parent::__construct(); 
    } 
}*/

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    require_once(APPPATH."third_party/PhpWord/Autoloader.php");
    use PhpOffice\PhpWord\Autoloader;
    use PhpOffice\PhpWord\Settings;
    use PhpOffice\PhpWord\PhpWord as PhpWord;
    
    Autoloader::register();
    Settings::loadConfig();

    class Word extends Autoloader {
        public function __construct() { 
            //parent::__construct(); 
        } 
    }

    ?>