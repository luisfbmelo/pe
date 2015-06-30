<?php

if(isset($_POST['action']))
{
        $name='=?UTF-8?B?'.base64_encode("PE - Projetos de Engenharia").'?=';
        $subject='=?UTF-8?B?'.base64_encode('Novo comentário').'?=';
        $headers="From: $name <{$_POST['email']}>\r\n".
            "Reply-To: {$_POST['email']}\r\n".
            "MIME-Version: 1.0\r\n".
            "Content-Type: text/html; charset=UTF-8";

        $body = 'Foi adicionado um novo comentário a um elemento do website.<br/><br/>
        Visite '.$_POST['url']['href'].' para o visualizar.';
        mail($_POST['email'],$subject,$body,$headers);

}