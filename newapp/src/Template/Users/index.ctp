<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('新規登録'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link('ログアウト', ['controller' => 'Users', 'action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('社員一覧') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!-- <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('name', '名前') ?></th>
                <th scope="col"><?= $this->Paginator->sort('birthday', '生年月日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email', 'メールアドレス') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender', '性別') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('created', '登録日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', '更新日') ?></th> -->
                <th scope="col" class="actions"><?= __('ステータス') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <!-- <td><?= $this->Number->format($user->id) ?></td> -->
                <td><?= h($user->name) ?></td>
                <td><?= h($user->birthday) ?></td>
                <td><?= h($user->email) ?></td>
                <td>
                    <?php
                        $genderLabels = [
                            'male' => '男性',
                            'female' => '女性',
                            'other' => 'その他'
                        ];
                        echo $genderLabels[$user->gender] ?? '未設定';
                    ?>
                </td>
                <!-- <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('詳細'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('更新'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
