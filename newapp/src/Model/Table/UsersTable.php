<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\EventInterface;
use ArrayObject;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        // ★ これを追加！
        $this->hasMany('Tasks', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
public function validationDefault(Validator $validator)
{
    $validator
        ->notEmptyString('name', '名前は必須です。')
        ->maxLength('name', 100, '名前は100文字以内で入力してください。')

        ->date('birthday', ['ymd'], '有効な日付を入力してください。')
        ->notEmptyDate('birthday', '生年月日は必須です。')

        ->email('email', false, '有効なメールアドレスを入力してください。')
        ->notEmptyString('email', 'メールは必須です。')

        ->notEmptyString('gender', '性別を選択してください。')
        ->inList('gender', ['male', 'female', 'other'], '性別は男性・女性・その他から選択してください。');

         $validator
        ->scalar('password')
        ->minLength('password', 6, 'パスワードは6文字以上で入力してください。')
        ->notEmptyString('password', 'パスワードを入力してください。');

    // ▼ パスワード確認
    $validator
        ->add('password_confirm', 'custom', [
            'rule' => function ($value, $context) {
                return $value === $context['data']['password'];
            },
            'message' => 'パスワードが一致しません。'
        ])
        ->notEmptyString('password_confirm', 'パスワード確認を入力してください。');
        
        // ▼ メール確認
        $validator
        ->add('email_confirm', 'match', [
            'rule' => function ($value, $context) {
                return $value === ($context['data']['email'] ?? null);
            },
            'message' => 'メールアドレスが一致しません。'
            ])
            ->notEmptyString('email_confirm', '確認用メールアドレスを入力してください。');
            
    return $validator;
}

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(
        ['email'],
        'このメールアドレスは既に登録されています。'
        ));
        return $rules;
    }

    public function beforeSave(EventInterface $event, $entity, ArrayObject $options)
{
    // パスワードが変更された時だけハッシュ化
    if ($entity->isDirty('password')) {
        $entity->password = (new DefaultPasswordHasher)->hash($entity->password);
    }
}    


}
