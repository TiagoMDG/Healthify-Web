<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
            'class' => 'backend\api\REstAPI',
        ],
    ],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => '\yii\rest\UrlRule', 'controller' =>'mealplaner','pluralize' => false,
                    'extraPatterns' => ['POST add/{ingredientsIDs}&{mealId}'=> 'add',],
                    'tokens'=>[
                        '{ingredientsIDs}' => '<ingredientsIDs:\\d+>',
                        '{mealId}'=>'<mealId:\\d+>',
                        ],
                    ],
                ['class' => '\yii\rest\UrlRule', 'controller' =>'api/user','pluralize' => false],
                ['class' => '\yii\rest\UrlRule', 'controller' =>'api/profile','pluralize' => false],
                ['class' => '\yii\rest\UrlRule', 'controller' =>'api/review','pluralize' => false,
                    'extraPatterns' => ['GET fromuser/{id}'=> 'fromuser',],
                ],
                ['class' => '\yii\rest\UrlRule', 'controller' =>'api/payment','pluralize' => false,
                    'extraPatterns' => ['POST {id}/pay/{card}'=> 'pay',],
                    'tokens'=>[
                        '{id}' => '<id:\\d+>',
                        '{card}'=>'<card:\\d+>',
                    ],
                ],
                ['class' => '\yii\rest\UrlRule', 'controller' =>'api/workedtime','pluralize' => false,
                    'extraPatterns' => ['GET workedtime/{id}'=> 'workedtime',
                        'POST attendance/{id}'=> 'attendance'],
                ],
                ['class' => '\yii\rest\UrlRule', 'controller' =>'api/meal','pluralize' => false],

                ['class' => '\yii\rest\UrlRule', 'controller' =>'api/reservations','pluralize' => false,
                    'extraPatterns' => ['POST reservar/{userprofilesid}&{reservedday}&{reservedtime}&{tableid}'=> 'reservar',],
                    'tokens'=>[
                        '{userprofilesid}' => '<userprofilesid:\\d+>',
                        '{reservedday}'=>'<reservedday:\\w+>',
                        '{reservedtime}'=>'<reservedtime:\\w+>',
                        '{tableid}'=>'<tableid:\\d+>',
                    ],
                ],
                ['class' => '\yii\rest\UrlRule', 'controller' =>'api/cart','pluralize' => false],
            ],
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
            ],

    ],
    'params' => $params,
];
