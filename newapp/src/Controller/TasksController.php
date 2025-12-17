<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 *
 * @method \App\Model\Entity\Task[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TasksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
public function index()
{
    $query = $this->Tasks->find()
        ->contain(['Users'])
        ->order(['Tasks.start_date' => 'DESC']);

    // 検索条件
    $keyword = $this->request->getQuery('keyword');
    $status = $this->request->getQuery('status');
    $userId = $this->request->getQuery('user_id');

    if (!empty($keyword)) {
        $query->where(['Tasks.task LIKE' => '%' . $keyword . '%']);
    }

    if ($status === 'done') {
        $query->where(['Tasks.status' => '完了']);
    } elseif ($status === 'undone') {
        $query->where(['Tasks.status' => '未完了']);
    }

    // ★ 担当者で絞り込み
    if (!empty($userId)) {
        $query->where(['Tasks.user_id' => $userId]);
    }

    // ページネーション設定
    $this->paginate = [
        'limit' => 5,
        'sortableFields' => ['task', 'start_date', 'status', 'end_date']
    ];

    $tasks = $this->paginate($query);

    // ★ 担当者プルダウン用（忘れてた部分）
    $this->loadModel('Users');
    $users = $this->Users->find('list', [
        'keyField' => 'id',
        'valueField' => 'name'
    ])->toArray();

    // ★ ここに users を追加するのが重要
    $this->set(compact('tasks', 'keyword', 'status', 'userId', 'users'));
}


    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => ['Users'], // ← これを追加！
        ]);

        $this->set('task', $task);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
public function add()
{
    $task = $this->Tasks->newEntity();

    if ($this->request->is('post')) {

        $task = $this->Tasks->patchEntity(
            $task,
            $this->request->getData(),
            ['associated' => ['Tags']] // ★ これが超重要
        );

        $data = $this->request->getData();

     
        $task = $this->Tasks->patchEntity($task, $this->request->getData());

        $task = $this->Tasks->patchEntity($task, $data);

        if ($this->Tasks->save($task)) {
            $this->Flash->success(__('タスクを追加しました。'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('タスクの追加に失敗しました。'));
    }

    // カレンダー表示用に全タスクを取得
    $tasks = $this->Tasks->find('all')
        ->contain(['Users']) // Users情報も取得
        ->order(['Tasks.start_date' => 'ASC'])
        ->toArray();

    // 担当者リスト（プルダウン用）
    $this->loadModel('Users');
    $users = $this->Users->find('list', [
        'keyField' => 'id',
        'valueField' => 'name'
    ])->toArray();

    // ビューへセット
    $this->set(compact('task', 'tasks', 'users'));

    
}




    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   public function edit($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => ['Users', 'Tags'], // Tags 追加
        ]);

        $task = $this->Tasks->get($id, [
            'contain' => ['Users'], // 担当者データを取得
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }

        // 担当者リスト
        $this->loadModel('Users');
        $users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

        $this->set(compact('task', 'users'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
