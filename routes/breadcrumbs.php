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