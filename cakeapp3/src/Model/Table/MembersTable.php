<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MembersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // テーブル名を設定
        $this->setTable('members');

        // 表示用フィールドを設定
        $this->setDisplayField('name');

        // 主キーを設定
        $this->setPrimaryKey('id');

        // Messagesテーブルとの関連付け
        $this->hasMany('Messages', [
            'foreignKey' => 'members_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmptyString('name', '名前は必須です');

        $validator
            ->allowEmptyString('mail');

        return $validator;
    }
}
