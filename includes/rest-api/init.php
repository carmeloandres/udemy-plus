<?php

function up_rest_api_init(){
    regsiter_rest_route('up/v1','/signup',[
        'methos' => 'POST',
        'callback' => 'up_rest_api_signup_handler',
        'permission_callback' => '__return_true'
    ]);

    register_rest_route('up/v1','/signin', [
        'methods' => 'POST',
        'callback' => 'up_rest_api_signin_handler',
        'permission_callback' => '__return_true'
    ]);

}