<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'git@github.com:vikramkannav/blog.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

desc('Symlink the env to the stage env file');
task('symlink_env',function(){
    if(get('stage') != 'local') {
        cd('{{release_path}}');
        run('ln -nfs --relative ./.env.' . get('stage') . ' ./.env');
    }
});

desc('Copy local file content to env.local id stage is local');
task('copy_local_env',function(){
    if(get('stage') == 'local'){
        upload('.env', '{{release_path}}/.env');
    }
});

desc('Clear the config file from bootstrap/cache folder');
task('config-clear',function(){
    cd('{{release_path}}');
    run('php artisan config:clear');
    run('rm .env');
    run('cp .env.'.get('stage').' .env');
});


after('deploy:shared', 'symlink_env');
//before('symlink_env', 'copy_local_env');
after('symlink_env', 'setup_dependencies');


// Writable dirs by web server
add('writable_dirs', []);


// Hosts

inventory('hosts.yml');


// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

