<?php

namespace sjsu_174\hw4; 

use seekquarry\yioop\configs as SYC;
use seekquarry\yioop\library as SYL;
use seekquarry\yioop\library\PhraseParser;

require_once "vendor/autoload.php";
print_r(PhraseParser::stemTerms("jumping", 'en-US'));
echo SYL\crawlHash(SYC\NAME_SERVER . "1234");