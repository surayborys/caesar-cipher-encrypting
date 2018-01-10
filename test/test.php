<?php

//test example
require_once '../src/Caesar.php';

$caesar = new surayborys\caesar\Caesar;

$encrypting_string = 'aaa BBB ccc DDD ... xxx YYY zzz 0123456789#+-*/\'\"\\\$\& ';
echo 'encrypting: ' . $encrypting_string . '<br>';

$encrypted_string =  $caesar->encrypt_with_caesar($encrypting_string, 123);
echo 'encrypted: ' . $encrypted_string . '<br>';


