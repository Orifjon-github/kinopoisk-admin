<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=10.8.8.164;dbname=imt',
    'username' => 'imt_user',
    'password' => 'P@ssword_01',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 60,
    'schemaCache' => 'cache',
];
