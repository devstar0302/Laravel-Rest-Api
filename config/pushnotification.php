<?php

return [
  'gcm' => [
      'priority' => 'normal',
      'dry_run' => false,
      'apiKey' => 'My_ApiKey',
  ],
  'fcm' => [
        'priority' => 'normal',
        'dry_run' => false,
        'apiKey' => 'AAAAklb_MN0:APA91bF2anpw5fl5gCPzCcQErJ6lRV5PZ-rs9gywkaEuiJpFo5iShlgb244telOPggZQB1ryXuS8CRwTZqMa7-RapD2zHc2Ue9mhbAoCXD8ZDFvN01F9bqQxg5UZh8fZ6YPZJzsYPC9A',
  ],
  'apn' => [
      'certificate' => __DIR__ . '/iosCertificates/apns-dev-cert.pem',
      'passPhrase' => '1234', //Optional
      'passFile' => __DIR__ . '/iosCertificates/yourKey.pem', //Optional
      'dry_run' => true
  ]
];