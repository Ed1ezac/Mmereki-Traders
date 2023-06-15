<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config
//Project repository
set('repository', 'git@github.com:Ed1ezac/Mmereki-Traders.git');
set('branch', 'production');

//[Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false); 
set('ssh_multiplexing', false);
set('keep_releases', 3);

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts
host('143.198.190.94')
    ->set('remote_user', 'deployer')
    ->set('identity_file','~/.ssh/dep')
    ->set('deploy_path', 'var/www/mmereki');

// Hooks

after('deploy:failed', 'deploy:unlock');


//Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate:fresh');//fresh
after('deploy:symlink', 'artisan:db:seed');