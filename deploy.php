<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/pvtw/pvtw.dev.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('pvtw.dev')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/pvtw.dev');

// Hooks

after('deploy:failed', 'deploy:unlock');
