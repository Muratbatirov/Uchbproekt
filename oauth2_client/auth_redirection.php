<?php
$query = http_build_query(array(
    'client_id' => '3',
    'redirect_uri' => 'http://dommoney/oauth2_client/callback.php',
    'response_type' => 'code',
    'scope' => '',
));
 
header('Location: http://dommoney/oauth/authorize?'.$query);