<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/smartlid/php/phpmailer/phpmailer.php');
    
    const SENDER = 'support@cashlike.online';
    const CATCHER = 'maksss2909@gmail.com';
    const SUBJECT = 'Заявка с сайта cashlike.online';
    const CHARSET = 'UTF-8';

    $nameIsRequired = false;
    $telIsRequired = true;
    $emailIsRequired = true;
    