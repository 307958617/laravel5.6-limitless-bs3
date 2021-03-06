<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/9/009
 * Time: 22:32
 */

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('login', function ($trail) {
    $trail->push('Login', route('login'));
});

Breadcrumbs::for('register', function ($trail) {
    $trail->push('Register', route('register'));
});

Breadcrumbs::for('departments', function ($trail) {
    $trail->parent('home');
    $trail->push('Departments', route('departments'));
});

Breadcrumbs::for('users', function ($trail) {
    $trail->parent('home');
    $trail->push('Users', route('users'));
});

Breadcrumbs::for('show_system_code', function ($trail) {
    $trail->parent('home');
    $trail->push('System_Code', route('show_system_code'));
});