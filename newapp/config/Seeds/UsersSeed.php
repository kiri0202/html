<?php
use Migrations\AbstractSeed;

class UsersSeed extends AbstractSeed
{
    public function run()
    {
        $data = [
          [
              'name' => '鈴木太郎',
              'birthday' => '1990-01-01',
              'email' => 'suzuki@example.com',
              'gender' => 'male',
              'created' => date('Y-m-d H:i:s'),
              'modified' => date('Y-m-d H:i:s'),
          ],
          [
              'name' => '佐藤花子',
              'birthday' => '1995-05-05',
              'email' => 'sato@example.com',
              'gender' => 'female',
              'created' => date('Y-m-d H:i:s'),
              'modified' => date('Y-m-d H:i:s'),
          ],
        ];


        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
