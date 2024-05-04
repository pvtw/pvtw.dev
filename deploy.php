<?php

declare(strict_types=1);

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('application', 'pvtw');
set('repository', 'https://github.com/pvtw/pvtw.dev.git');

// Hosts

host('pvtw.dev')
    ->set('remote_user', 'deployer')
    ->set('hostname', 'pvtw.dev')
    ->set('deploy_path', '/var/www/{{hostname}}');

task('npm:install', function (): void {
    cd('{{release_or_current_path}}');
    run('source $HOME/.nvm/nvm.sh && npm install');
});

task('npm:run:build', function (): void {
    cd('{{release_or_current_path}}');
    run('source $HOME/.nvm/nvm.sh && npm run build');
});

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:view:cache',
    'artisan:event:cache',
    //'artisan:migrate',
    'npm:install',
    'npm:run:build',
    'deploy:publish',
]);

// Hooks

after('deploy:failed', 'deploy:unlock');
