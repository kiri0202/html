<?php
use Migrations\AbstractMigration;

class CreateTasks extends AbstractMigration
{
    public function change()
    {
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
