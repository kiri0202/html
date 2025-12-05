<?php
namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        
    }
    // -------------------------
    // ログイン処理
    // -------------------------
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('メールアドレスかパスワードが間違っています。');
        }
    }

    // -------------------------
    // ログアウト処理
    // -------------------------
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    // -------------------------
    // ユーザー一覧 (管理用)
    // -------------------------
    public function index()
    {
        $this->loadModel('Tasks');

        $users = $this->paginate($this->Users);

        // Tasks をユーザー情報と一緒に取得
        $tasks = $this->Tasks->find()
            ->contain(['Users'])
            ->all();

        $this->set(compact('users', 'tasks'));
    }

    // -------------------------
    // ユーザー詳細
    // -------------------------
    public function view($id = null)
    {
        $user = $this->Users->get($id, ['contain' => ['Tasks']]);
        $this->set('user', $user);
    }

    // -------------------------
    // ユーザー追加（新規登録）
    // -------------------------
    public function add()
    {
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $user = $this->Users->patchEntity($user, $data);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('ユーザーを追加しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('ユーザーの追加に失敗しました。'));
        }

        $this->set(compact('user'));
    }

    // -------------------------
    // ユーザー編集
    // -------------------------
    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('ユーザー情報を保存しました。');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('保存に失敗しました。');
        }
        $this->set(compact('user'));
    }

    // -------------------------
    // ユーザー削除
    // -------------------------
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('ユーザーを削除しました。');
        } else {
            $this->Flash->error('削除に失敗しました。');
        }
        return $this->redirect(['action' => 'index']);
    }
}
