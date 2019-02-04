<?php
namespace Deployer;

require 'recipe/common.php';

set('current_path', function () {
    return run('pwd');
});

set('wp_path', '/home/1/d/deltahouse/www');
set('remote_path', '/home/1/d/deltahouse/www/wp-content/themes/delta');

set('deploy_path', 'remote_path');

// Project repository
// set('repository', 'git@github.com:creaturmedia/generasjonsskiftet.git');

// Hosts deltahouse@bedkomdelta.no
host('ssh.domeneshop.no')
    ->user('deltahouse')
    ->port(22)
    ->identityFile('~/.ssh/id_rsa')
    ->set('deploy_path', '~/{{remote_path}}');
    

// Tasks

task('push', 'git checkout master && git push master master')->local();

task('pull', function() {
    cd('{{remote_path}}');
    run('git pull master master');
});

// Build the files locally
task('build', 'yarn run build')->local();

// Upload the dist folder
task('dist', function() {
    
    // Upload the "dist" folder
    upload('dist/', '{{remote_path}}/dist');

    // Clean up .DS_Store files
    cd('{{remote_path}}/dist');
    run('find . -name ".DS_Store" -type f -delete');
});


// Return to normal locally
task('yarn', 'yarn run build:production')->local();

task('deploy', [
    'push',
    'build',
    'pull',
    'dist',
    'yarn',
    //'flush',
]);

task('deploy:php', [
    'push',
    'pull',
    //'flush',
]);

task('deploy:after', function() {
    writeln('<info>***</info>');
    writeln('<info>Deploy done!</info>');
    writeln('<info>***</info>');
});

after('deploy', 'deploy:after');

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');