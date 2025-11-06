<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link('タスク一覧に戻る', ['action' => 'index']) ?></li>
    </ul>

    <div class="sidebar-bottom">
        <?= $this->element('calendar', ['tasks' => $tasks]) ?>
    </div>
</nav>

<div class="tasks form large-9 medium-8 columns content">
    <h1>タスク追加</h1>
    <?= $this->Form->create($task) ?>
    <fieldset>
        <legend>タスクを追加</legend>
        <?php
            echo $this->Form->control('task', [
                'label' => '課題名',
                'type' => 'text',
            ]);

            echo $this->Form->control('start_date', [
                'label' => '開始日時',
                'type' => 'text',
                'value' => date('Y-m-d H:i:s'),
                'readonly' => true
            ]);

            echo $this->Form->control('end_date', [
                'label' => '終了日',
                'type' => 'date',
                'dateFormat' => 'YMD',
                'monthNames' => [
                    1 => '1月', 2 => '2月', 3 => '3月', 4 => '4月',
                    5 => '5月', 6 => '6月', 7 => '7月', 8 => '8月',
                    9 => '9月', 10 => '10月', 11 => '11月', 12 => '12月'
                ]
            ]);

            echo $this->Form->hidden('status', ['value' => '未完了']);
            echo $this->Form->control('description', ['label' => '内容']);
        ?>
    </fieldset>
    <?= $this->Form->button('登録') ?>
    <?= $this->Form->end() ?>
</div>
