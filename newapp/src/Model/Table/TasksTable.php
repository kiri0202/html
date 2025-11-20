<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tasks Model
 *
 * @method \App\Model\Entity\Task get($primaryKey, $options = [])
 * @method \App\Model\Entity\Task newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Task[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Task|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Task saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Task patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Task[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Task findOrCreate($search, callable $callback = null, $options = [])
 */
class TasksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('tasks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);
    }
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
   public function validationDefault(Validator $validator): Validator
{
    $validator
        ->integer('id')
        ->allowEmptyString('id', null, 'create')

        ->scalar('task')
        ->maxLength('task', 100, 'タスクは100文字以内で入力してください。')
        ->notEmptyString('task', 'タスク名は必須です。')

        ->dateTime('start_date')
        ->notEmptyDateTime('start_date', '開始日は必須です。')

        ->scalar('status')
        ->maxLength('status', 128)
        ->allowEmptyString('status')

        ->date('end_date', ['ymd'], '有効な日付を入力してください。')
        ->notEmptyDate('end_date', '終了日は必須です。')
        ->add('end_date', 'future', [
            'rule' => function ($value, $context) {
                if (is_array($value)) {
                    $value = sprintf('%04d-%02d-%02d', $value['year'], $value['month'], $value['day']);
                }

                $today = new \DateTime('today');
                $endDate = new \DateTime($value);
                return $endDate >= $today;
            },
            'message' => '終了日は今日以降の日付を指定してください。'
        ])

        ->scalar('description')
        ->maxLength('description', 200, '内容は200文字以内です。')
        ->notEmptyString('description', '内容は必須です。');

    return $validator;
}

}
