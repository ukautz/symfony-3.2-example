<?php

$secrets = json_decode(file_get_contents($_SERVER['APP_SECRETS']), true);

$container->setParameter('session_memcache_expire', getenv('SESSION_MEMCACHE_EXPIRE') ?: 86400);
$container->setParameter('session_memcache_prefix', getenv('SESSION_MEMCACHE_PREFIX') ?: 'ez_');
$container->setParameter('session_memcache_host_1', $secrets['MEMCACHE']['HOST1']);
$container->setParameter('session_memcache_port_1', $secrets['MEMCACHE']['PORT1']);
if (isset($secrets['MEMCACHE']['HOST2'])) {
    $container->setParameter('session_memcache_host_2', $secrets['MEMCACHE']['HOST2']);
    $container->setParameter('session_memcache_port_2', $secrets['MEMCACHE']['PORT2']);
}