<?php

use Cake\I18n\FrozenTime;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task[]|\Cake\Collection\CollectionInterface $tasks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
       
        <li><?= $this->Html->link('新規タスク追加', ['action' => 'add']) ?></li>
    </ul>
</nav>

<div class="tasks index large-9 medium-8 columns content">
    <h3>タスク一覧</h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('task', '課題名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date', '開始日時') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status', 'ステータス') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date', '終了日') ?></th>
                <th scope="col" class="actions">操作</th>
            </tr>
        </thead>
        <tbody>
        <?php
            use Cake\I18n\FrozenDate;
            $today = new FrozenDate();
        ?>
        <?php foreach ($tasks as $task): ?>
            <?php
                $rowClass = '';

                if ($task->status === '完了') {
                    $rowClass = 'completed-task';
                }
                elseif ($task->status === '未完了' && $task->end_date) {
                // 時刻付きの可能性があるため、日付部分だけ比較
                $endDateOnly = ($task->end_date instanceof FrozenTime)
                    ? $task->end_date->toDateString()
                    : $task->end_date->format('Y-m-d');

                if ($endDateOnly <= $today->format('Y-m-d')) {
                    $rowClass = 'expired-task';
                }
        }
            ?>
            <tr class="<?= $rowClass ?>">
                <td><?= h($task->task) ?></td>
                <td><?= $task->start_date ? $task->start_date->i18nFormat('yyyy/MM/dd HH:mm') : '' ?></td>
                <td><?= h($task->status) ?></td>
                <td><?= $task->end_date ? $task->end_date->i18nFormat('yyyy/MM/dd') : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link('詳細', ['action' => 'view', $task->id]) ?>
                    <?= $this->Html->link('編集', ['action' => 'edit', $task->id]) ?>
                    <?= $this->Form->postLink('削除', ['action' => 'delete', $task->id], [
                        'confirm' => "「{$task->task}」を削除してもよろしいですか？"
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< 最初') ?>
            <?= $this->Paginator->prev('< 前へ') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('次へ >') ?>
            <?= $this->Paginator->last('最後 >>') ?>
        </ul>
        <p><?= $this->Paginator->counter([
            'format' => '全 {{count}} 件中 {{page}} / {{pages}} ページ目（{{current}} 件表示）'
        ]) ?></p>
    </div>
</div>
