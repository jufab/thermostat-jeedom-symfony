<?php
namespace Deployer;

require 'recipe/symfony4.php';

// Project name
set('application', 'thermostat-jeedom-symfony');

// Project repository
set('repository', 'git@github.com:jufab/thermostat-jeedom-symfony.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
//add('shared_files', []);
//add('shared_dirs', []);

// Writable dirs by web server 
//add('writable_dirs', []);
set('writable_mode', 'chmod');
set('allow_anonymous_stats', false);

set('http_user', 'admin');

// Hosts

set('default_stage', 'prod');
host('192.168.2.12')
    ->user('admin')
    ->stage("prod")
    ->port(2222)
    ->set('deploy_path', '/volume2/web/thermostat');
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

task('deploy:droit', 'chmod -Rf 777 var/');
after('deploy', 'deploy:droit');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'database:migrate');

