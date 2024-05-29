<?php
return [
  'Cors' => [
      'AllowOrigin' => ['http://localhost:3000'],
      'AllowMethods' => ['GET', 'POST', 'PUT', 'DELETE'],
      'AllowHeaders' => ['Authorization', 'Content-Type'],
      'AllowCredentials' => true,
      'ExposeHeaders' => [],
      'MaxAge' => 0,
  ],
];