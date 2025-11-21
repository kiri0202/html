<?php
use Migrations\AbstractMigration;

class CreateTasks extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('name', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('birthday', 'date', ['null' => false])
            ->addColumn('email', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('gender', 'enum', ['values' => ['male', 'female', 'other'], 'null' => false])
            ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP', 'null' => true])
            ->addColumn('modified', 'datetime', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'null' => true])
            ->addIndex(['email'], ['unique' => true]) // emailはユニーク
            ->create();
            
        $table = $this->table('tasks');
        $table->addColumn('user_id', 'integer', ['null' => true])
              ->addColumn('task', 'string', ['limit' => 128, 'null' => true])
              ->addColumn('start_date', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
              ->addColumn('status', 'string', ['limit' => 128, 'null' => true])
              ->addColumn('end_date', 'date', ['null' => true])
              ->addColumn('description', 'text', ['null' => true])
              ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
              ->create();

    }
}
