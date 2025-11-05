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
        $query = $this->Tasks->find();

        // ステータスフィルタ（URLパラメータで切り替え）
        $status = $this->request->getQuery('status');

        if ($status === 'done') {
            $query->where(['Tasks.status' => '完了']);
        } elseif ($status === 'undone') {
            $query->where(['Tasks.status' => '未完了']);
        }

        $this->paginate = [
            'order' => ['Tasks.start_date' => 'asc'],
            'sortableFields' => ['id', 'task', 'start_date', 'status', 'end_date'],
            'limit' => 3
        ];

        $tasks = $this->paginate($query);
        $this->set(compact('tasks', 'status'));
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
            'contain' => [],
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
            $data = $this->request->getData();

            $task = $this->Tasks->patchEntity($task, $data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('タスクを追加しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('タスクの追加に失敗しました。'));
        }

        $this->set(compact('task'));
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
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $this->set(compact('task'));
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
