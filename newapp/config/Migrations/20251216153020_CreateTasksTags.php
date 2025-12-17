<?php
use Migrations\AbstractMigration;

class CreateTasksTags extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('tasks_tags', [
            'id' => false,
            'primary_key' => ['task_id', 'tag_id'],
        ]);

        $table
            ->addColumn('task_id', 'integer', ['null' => false])
            ->addColumn('tag_id', 'integer', ['null' => false])
            ->addIndex(['task_id'])
            ->addIndex(['tag_id'])
            ->create();
    }
}
