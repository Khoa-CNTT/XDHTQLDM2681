<?php

return [
    'vnp_TmnCode' => env('VNPAY_TMN_CODE'),
    'vnp_HashSecret' => env('VNPAY_HASH_SECRET'),
    'vnp_Url' => env('VNPAY_BASE_URL'),
    'vnp_ReturnUrl' => env('VNPAY_RETURN_URL'),
    'vnp_Command' => env('VNPAY_COMMAND', 'pay'),
    'vnp_CurrCode' => env('VNPAY_CURR_CODE', 'VND'),
    'vnp_Version' => env('VNPAY_VERSION', '2.1.0'),
    'vnp_Locale' => env('VNPAY_LOCALE', 'vn'),
];
