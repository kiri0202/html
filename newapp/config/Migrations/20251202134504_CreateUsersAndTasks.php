<?php
use Migrations\AbstractMigration;

class CreateUsersAndTasks extends AbstractMigration
{
    public function change()
    {
        // ----------------------------
        // users テーブル
        // ----------------------------
        $table = $this->table('users');
        $table->addColumn('name', 'string', ['limit' => 100, 'null' => false])
              ->addColumn('birthday', 'date', ['null' => true])
              ->addColumn('email', 'string', ['limit' => 191, 'null' => false])
              ->addColumn('gender', 'string', ['limit' => 10, 'null' => true])
              ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
              ->addColumn('created', 'datetime', ['null' => true])
              ->addColumn('modified', 'datetime', ['null' => true])
              ->addIndex(['email'], ['unique' => true])
              ->create();

        // ----------------------------
        // tasks テーブル
        // ----------------------------
        $table = $this->table('tasks');
        $table->addColumn('user_id', 'integer', ['null' => true])
              ->addColumn('task', 'string', ['limit' => 128, 'null' => false])
              ->addColumn('start_date', 'datetime', ['null' => true])
              ->addColumn('status', 'string', ['limit' => 128, 'null' => true])
              ->addColumn('end_date', 'date', ['null' => true])
              ->addColumn('description', 'text', ['null' => true])
              ->addColumn('created', 'datetime', ['null' => true])
              ->addColumn('modified', 'datetime', ['null' => true])
              ->addForeignKey('user_id', 'users', 'id', [
                  'delete' => 'CASCADE',
                  'update' => 'NO_ACTION'
              ])
              ->create();
    }
}
