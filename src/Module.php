<?php

namespace portalium\user;

use portalium\site\widgets\LoginButton;

class Module extends \portalium\base\Module
{
    const EVENT_USER_CREATE = 'user-create';
    const EVENT_USER_UPDATE = 'user-update';
    const EVENT_USER_GROUP_ADD = 'user-group-add';
    const EVENT_USER_GROUP_REMOVE = 'user-group-remove';
    const EVENT_USER_DELETE = 'user-delete';
    const EVENT_USER_DELETE_BEFORE = 'user-delete-before';

    public static $description = 'User Management Module';
    public $apiRules = [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                'user/users'
            ]
        ],
    ];

    public static $tablePrefix = 'user_';
    public function getMenuItems(){
        $menuItems = [
            [
                [
                    'type' => 'model',
                    'class' => 'portalium\user\models\User',
                    'route' => '/user/default/view',
                    'field' => [ 'id' => 'id', 'name' => 'username' ],
                ],
                [
                    'type' => 'action',
                    'route' => '/user/default/index',
                ],
            ],
        ];
        return $menuItems;
    }

    public static function moduleInit()
    {
        self::registerTranslation('user','@portalium/user/messages',[
            'user' => 'user.php',
        ]);
    }

    public static function t($message, array $params = [])
    {
        return parent::coreT('user', $message, $params);
    }
}
