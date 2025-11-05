<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;
 
class PersonsController extends AppController
{
    public $paginate = [
        'limit' => 5,
        'order' => [
            'Persons.name' => 'asc'
        ]
    ];
     
     public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
 
    public function index()
{
    $this->paginate = [
        'contain' => ['Members']
    ];
    $this->set('messages', $this->paginate($this->Messages));
    $this->set('_serialize', ['messages']);
}
  public function add()
    {
        $person = $this->Persons->newEntity();
        $this->set('person', $person);
        if ($this->request->is('post')) {
            $validator = new Validator();
            $validator->add(
                'age','comparison',['rule' =>['comparison','>',20]]
            );
            $errors = $validator->errors($this->request->data);
            if (!empty($errors)){
                $this->Flash->error('comparison error');
            } else {
                $person = $this->Persons->patchEntity($person, 
                    $this->request->data);        
                if ($this->Persons->save($person)) {
                    return $this->redirect(['action' => 'index']);
                }
            }
    
        }
    }
}

// namespace App\Controller;
 
// use App\Controller\AppController;
 
// class PersonsController extends AppController{
 
    // public function add(){
    //     if ($this->request->is('post')) {
    //         $person = $this->Persons->newEntity();
    //         $person = $this->Persons->patchEntity($person, $this->request->data);
    //         if ($this->Persons->save($person)) {
    //             return $this->redirect(['action' => 'index']);
    //         }
    //     }
    // }

    // public function index(){
    //     $this->set('persons', $this->Persons->find('all'));
    // }

    // public function edit($id = null){
    //     $person = $this->Persons->get($id);
    //     if ($this->request->is(['post', 'put'])) {
    //         $person = $this->Persons->patchEntity($person, $this->request->data);
    //         if ($this->Persons->save($person)) {
    //             return $this->redirect(['action' => 'index']);
    //         }
    //     } else {
    //         $this->set('person', $person);
    //     }
    // }

    // public function delete($id = null){
    //     $person = $this->Persons->get($id);
    //     if ($this->request->is(['post', 'put'])) {
    //         if ($this->Persons->delete($person)) {
    //             return $this->redirect(['action' => 'index']);
    //         }
    //     } else {
    //         $this->set('person', $person);
    //     }
    // }

    // public function find() {
    //     $persons = [];
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $persons = $this->Persons->find()
    //             ->where(["name like " => '%' . $find . '%']);
    //     }    $this->set('msg', null);
    //     $this->set('persons', $persons);
    // }
    
    // selectとorder

    // public function find() {
    //     $this->set('msg', null);
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $persons = $this->Persons->find()
    //             ->select(['id', 'name'])
    //             ->order(['name' =>'Asc'])
    //             ->where(["name like " => '%' . $find . '%']);
    //     } else {
    //         $persons = [];
    //     }
    //     $this->set('persons', $persons);
    // }

    // offsetとlimit

    // public function find() {
    //     $this->set('msg', null);
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $first = $this->Persons->find()
    //             ->limit(1)
    //             ->where(["name like " => '%' . $find . '%']);
    //         $persons = $this->Persons->find()
    //             ->offset(1)
    //             ->limit(3)
    //             ->where(["name like " => '%' . $find . '%']);
    //         $this->set('msg', $first->first()->name . ' is first data.');
    //     } else {
    //         $persons = [];
    //     }
    //     $this->set('persons', $persons);
    // }

    // ダイナミックファインダー（Dynamic Finder）

    // public function find() {
    //     $this->set('msg', null);
    //     $persons = [];
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $persons = $this->Persons->findByName($find);
    //     }
    //     $this->set('persons', $persons);
    // }

    // 最初と最後、検索数

    // public function find() {
    //     $this->set('msg', null);
    //     $persons = [];
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $first = $this->Persons->find()
    //             ->where(["name like " => '%' . $find . '%'])
    //             ->first();
    //         $count = $last = $this->Persons->find()
    //             ->where(["name like " => '%' . $find . '%'])
    //             ->count();
    //         $last = $this->Persons->find()
    //             ->offset($count - 1)
    //             ->where(["name like " => '%' . $find . '%'])
    //             ->first();
    //         $persons = $this->Persons->find()
    //             ->where(["name like " => '%' . $find . '%']);
    //         $msg = 'FIRST: "' . $first->name . '", LAST: "' . $last->name . '". (' . $count . ')';
    //         $this->set('msg', $msg);
    //     }
    //     $this->set('persons', $persons);
    // }

    // AND/OR検索

    // public function find() {
    //     $this->set('msg', null);
    //     $persons = [];
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $persons = $this->Persons->find()
    //             ->where(["name like " => '%' . $find . '%'])
    //             ->orWhere(["mail like " => '%' . $find . '%']);
    //     }
    //     $this->set('persons', $persons);
    // }

    // QueryExpressionの利用

    // public function find() {
    //     $persons = [];
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $query = $this->Persons->find();
    //         $exp = $query->newExpr();
    //         $fnc = function($exp, $find) {
    //             return $exp->gte('age', $find * 1);
    //         };
    //         $persons = $query->where($fnc($exp,$find));
    //     }
    //     $this->set('persons', $persons);
    //     $this->set('msg', null);
    // }

    // QueryExpression

    // public function find() {
    //     $persons = [];
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $query = $this->Persons->find();
    //         $exp = $query->newExpr();
    //         $fnc = function($exp, $f) {
    //             return $exp
    //                 ->isNotNull('name')
    //                 ->isNotNull('mail')
    //                 ->gt('age',0)
    //                 ->in('name', explode(',',$f));
    //         };
    //         $persons = $query->where($fnc($exp,$find));
    //     }
    //     $this->set('persons', $persons);
    //     $this->set('msg', null);
    // }

    // use Cake\Datasource\ConnectionManager; // このuseを追加
 
    // public function find() {
    //     $this->set('msg', null);
    //     $persons = [];
    //     if ($this->request->is('post')) {
    //         $find = $this->request->data['find'];
    //         $connection = ConnectionManager::get('default');
    //         $query = 'select * from persons where ' . $find;
    //         $persons = $connection->query($query)->fetchAll();
    //     }
    //     $this->set('persons', $persons);
    // }

   
// }