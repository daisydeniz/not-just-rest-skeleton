<?php

return [
    'failed' => 'Girdiğiniz bilgiler hatalıdır.',
    'password' => 'Şifre hatalıdır.',
    'throttle' => 'Çok fazla giriş denemesi. Lütfen :seconds saniye sonra tekrar deneyin.',

    'validation' => [
        'email' => [
            'required' => 'Email adresi gereklidir.',
            'email' => 'Geçerli bir email adresi giriniz.',
            'exists' => 'Bu email adresi kayıtlı değildir.',
        ],
        'password' => [
            'required' => 'Şifre gereklidir.',
            'min' => 'Şifre en az :min karakter olmalıdır.',
        ],
    ],

    'messages' => [
        'logout_success' => 'Başarıyla çıkış yapıldı',
        'login_success' => 'Başarıyla giriş yapıldı',
    ],
];
