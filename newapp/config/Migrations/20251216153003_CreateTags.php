<?php
use Migrations\AbstractMigration;

class CreateTags extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('tags');
        $table
            ->addColumn('name', 'string', [
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();
    }
}

