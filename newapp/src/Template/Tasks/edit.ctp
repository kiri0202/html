<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">操作</li>
        <li>
            <?= $this->Form->postLink(
                '削除',
                ['action' => 'delete', $task->id],
                ['confirm' => "本当に #{$task->id} を削除しますか？"]
            ) ?>
        </li>
        <li><?= $this->Html->link('タスク一覧へ', ['action' => 'index']) ?></li>
    </ul>
</nav>

<div class="tasks form large-9 medium-8 columns content">
    <?= $this->Form->create($task) ?>
    <fieldset>
        <legend>タスク編集</legend>
        <?php
            // 課題名
            echo $this->Form->control('task', ['label' => '課題名']);

            // 開始日時（編集不可）
            echo $this->Form->control('start_date', [
                'label' => '開始日時',
                'type' => 'text',
                'value' => $task->start_date ? $task->start_date->format('Y-m-d H:i:s') : '',
                'readonly' => true
            ]);

            // ステータス（完了/未完了）
            echo $this->Form->control('status', [
                'label' => 'ステータス',
                'type' => 'select',
                'options' => [
                    '未完了' => '未完了',
                    '完了' => '完了'
                ]
            ]);

            // 終了日（HTML5カレンダー形式）
            echo $this->Form->control('end_date', [
                'label' => '終了日',
                'type' => 'date',
                'value' => $task->end_date ? $task->end_date->format('Y-m-d') : '',
                'templates' => [
                    'input' => '<input type="{{type}}" name="{{name}}" value="{{value}}" {{attrs}}>'
                ]
            ]);

            // 内容
            echo $this->Form->control('description', ['label' => '内容']);
        ?>
    </fieldset>
    <?= $this->Form->button('更新') ?>
    <?= $this->Form->end() ?>
</div>
