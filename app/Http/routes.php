<?php

$app->group(['middleware' => 'log-requests'], function () use ($app) {

    $app->get('/', function () use ($app) {
        return $app->welcome();
    });

    $app->post('gitlab/hook', [
        'as' => 'hook', 'uses' => 'GitlabController@hookHandler'
    ]);

    // lumen route doesn't have any() method
    $app->post('gitlab/user/list', [
        'as' => 'create-user', 'uses' => 'UserController@createUserList'
    ]);
    $app->get('gitlab/user/list', [
        'as' => 'create-user', 'uses' => 'UserController@createUserList'
    ]);

    $app->get('gitlab/user/view/{id}', [
        'as' => 'get-user', 'uses' => 'UserController@getGitUser'
    ]);

    // get a list of projects which are owned by the auth user.
    $app->get('gitlab/projects/owned', [
        'as' => 'get-owned-project', 'uses' => 'ProjectController@ownedProjects'
    ]);

    $app->get('gitlab/projects/view/{id}', [
        'as' => 'view-project', 'uses' => 'ProjectController@viewProject'
    ]);

    // get all project in gitlab. ! admin only
    $app->get('gitlab/projects/all', [
        'as' => 'get-all-project', 'uses' => 'ProjectController@allProjects'
    ]);

    // Get a list of project hooks.
    $app->get('gitlab/projects/hook/{id}', [
        'as' => 'get-project-hooks', 'uses' => 'ProjectController@projectHooks'
    ]);

    $app->post('gitlab/projects/add-hook', [
        'as' => 'add-project-hook', 'uses' => 'ProjectController@addOrEditProjectHooks'
    ]);

    // set all project hook
    $app->post('gitlab/projects/add-hook-all-projects', [
        'as' => 'add-all-project-hook', 'uses' => 'ProjectController@addHookAllProjects'
    ]);

});