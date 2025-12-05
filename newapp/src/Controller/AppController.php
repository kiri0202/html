<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        // ★ Auth を全コントローラ共通で有効にする
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            // ログインページ
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            // ログイン後の遷移
            'loginRedirect' => [
                'controller' => 'Tasks',
                'action' => 'index'
            ],
            // ログアウト後の遷移
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => 'ログインが必要です。',
            'unauthorizedRedirect' => $this->referer()
        ]);

        // ★ ログインと新規登録だけは誰でもアクセス可能にする
        $this->Auth->allow(['login', 'add']);
    }

    // 旧仕様の beforeFilter を使いたい場合はここ
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }
}
