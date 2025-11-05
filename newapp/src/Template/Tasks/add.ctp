<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">操作</li>
        <li><?= $this->Html->link('タスク一覧に戻る', ['action' => 'index']) ?></li>
    </ul>
</nav>

<div class="tasks form large-9 medium-8 columns content">
    <h1>タスク追加</h1>
    <?= $this->Form->create($task) ?>
    <fieldset>
        <legend>タスクを追加</legend>
        <?php
            echo $this->Form->control('task', ['label' => '課題']);

            echo $this->Form->control('start_date', [
                'label' => '開始日時',
                'type' => 'text',
                'value' => date('Y-m-d H:i:s'),
                'readonly' => true
            ]);

            echo $this->Form->control('end_date', [
                'label' => '終了日',
                'type' => 'date',
                'templates' => [
                    'input' => '<input type="{{type}}" name="{{name}}" {{attrs}} />'
                ]
            ]);

            echo $this->Form->hidden('status', ['value' => '未完了']);
            echo $this->Form->control('description', ['label' => '内容']);
        ?>
    </fieldset>
    <?= $this->Form->button('登録') ?>
    <?= $this->Form->end() ?>
</div>
<?php
