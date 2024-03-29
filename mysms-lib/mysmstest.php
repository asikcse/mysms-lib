<?php
/*
 * Copyright 2008 Nimf
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *    http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 */
 
require_once('./lib/nimf_logger.php');
require_once('./lib/nimf_sockclient.php');
require_once('./lib/nimf_smppclient.php');
require_once('./lib/nimf_mysms.php');

$logger = new NIMF_logger('./logs/%Y-%m-%d.log',L_ALL);
function l($msg,$lvl=L_DEBG) {global $logger; if (isset($logger)) $logger->log($msg,$lvl);}

l('MySMS Test started.');

$esme = new NIMF_mysms();

$esme->bind();

$esme->send_sms(
  array(
    'dst' => '77012111189',
    'text' => 'This is a simple message'
    //'text' => 'Это очень длинное сообщение на русском. Должно прити в юникоде. Судя по всему я могу использовать до семидесяти символов, но тут явно больше, значит придет две части или больше.'
  )
);
sleep(1);

$esme->disconnect();

l('MySMS Test ended.');

$logger->shutdown();