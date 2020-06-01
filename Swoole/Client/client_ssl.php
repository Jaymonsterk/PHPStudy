<?php
$client = new Swoole\Client(SWOOLE_SOCK_TCP | SWOOLE_SSL);
$client->set([
    'ssl_cert_file' => __DIR__.'/ca/client-cert.pem',
    'ssl_key_file' => __DIR__.'/ca/client-key.pem',
    'ssl_allow_self_signed' => true,
    'ssl_verify_peer' => true,
    'ssl_cafile' => __DIR__.'/ca/ca-cert.pem',
]);
if (!$client->connect('127.0.0.1', 9501, -1)) {
    exit("connect failed. Error: {$client->errCode}\n");
}
echo "connect ok\n";
$client->send('hello world-'.str_repeat('A', 10)."\n");
echo $client->recv();