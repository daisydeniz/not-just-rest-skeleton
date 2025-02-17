<?php

return [
    'failed' => 'These credentials do not match our records.',
    'password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    'validation' => [
        'email' => [
            'required' => 'The email field is required.',
            'email' => 'Please enter a valid email address.',
            'exists' => 'This email is not registered.',
        ],
        'password' => [
            'required' => 'The password field is required.',
            'min' => 'The password must be at least :min characters.',
        ],
    ],

    'messages' => [
        'logout_success' => 'Successfully logged out',
        'login_success' => 'Successfully logged in',
    ],
];
