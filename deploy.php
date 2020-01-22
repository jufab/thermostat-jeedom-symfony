<?php
namespace Deployer;

require 'recipe/symfony4.php';

// Project name
set('application', 'thermostat-jeedom-symfony');
// Project repository
set('repository', 'git@github.com:jufab/thermostat-jeedom-symfony.git');
// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);
set('keep_releases', 2);
// Shared files/dirs between deploys 
add('shared_files', ['.env']);
//add('shared_dirs', []);
// Writable dirs by web server 
//add('writable_dirs', []);
set('writable_mode', 'chmod');
set('http_user', 'http');
set('writable_chmod_mode','0777');
set('writable_use_sudo', false);
set('allow_anonymous_stats', false);
//
set('bin/git', '/usr/local/bin/git');
set('bin/php', '/usr/bin/php73');
// Hosts
set('default_stage', 'prod');
host('192.168.2.12')
    ->user('admin')
    ->stage("prod")
    ->port(2222)
    ->forwardAgent()
    ->set('deploy_path', '/volume1/web/thermostat');
// Tasks
/*task('deploy:cache-prod', function() {
    run('cd {{release_path}} && mkdir -p var/cache/prod && chmod -Rf 777 var/');
});
after('deploy', 'deploy:cache-prod');*/

/*task('cleanup:before',function() {
    run('cd {{release_path}} && cd .. && chown -R admin *');
});
before('cleanup', 'cleanup:before');
*/
// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'database:migrate');

