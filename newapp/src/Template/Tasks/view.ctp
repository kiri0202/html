<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">操作</li>
        <li><?= $this->Html->link('編集', ['action' => 'edit', $task->id]) ?> </li>
        <li><?= $this->Form->postLink('削除', ['action' => 'delete', $task->id], ['confirm' => "タスク #{$task->id} を削除してもよろしいですか？"]) ?> </li>
        <li><?= $this->Html->link('一覧へ戻る', ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link('新規タスク追加', ['action' => 'add']) ?> </li>
    </ul>
</nav>

<div class="tasks view large-9 medium-8 columns content">
    <h3>タスク詳細（ID: <?= h($task->id) ?>）</h3>
    <table class="vertical-table">
        <tr>
            <th scope="row">課題名</th>
            <td><?= h($task->task) ?></td>
        </tr>
        <tr>
            <th scope="row">ステータス</th>
            <td><?= h($task->status) ?></td>
        </tr>
        <tr>
            <th scope="row">開始日時</th>
            <td><?= h($task->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row">終了日</th>
            <td><?= h($task->end_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4>詳細内容</h4>
        <?= $this->Text->autoParagraph(h($task->description)); ?>
    </div>
</div>
