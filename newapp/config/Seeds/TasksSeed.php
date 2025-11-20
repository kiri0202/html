<?php
use Migrations\AbstractSeed;

class TasksSeed extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'user_id' => 1,
                'task' => '資料作成',
                'start_date' => date('Y-m-d H:i:s'),
                'status' => '未完了',
                'end_date' => date('Y-m-d', strtotime('+3 days')),
                'description' => '企画書のドラフトを作成する。',
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'task' => 'ミーティング準備',
                'start_date' => date('Y-m-d H:i:s'),
                'status' => '未完了',
                'end_date' => date('Y-m-d', strtotime('+1 week')),
                'description' => 'クライアントミーティングの資料準備。',
            ],
        ];

        $table = $this->table('tasks');
        $table->insert($data)->save();
    }
}
