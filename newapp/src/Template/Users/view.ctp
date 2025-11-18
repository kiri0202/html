<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('社員更新'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('社員削除'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('社員一覧'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('新規登録'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('名前') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('メールアドレス') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('性別') ?></th>
            <td><?php
                        $genderLabels = [
                            'male' => '男性',
                            'female' => '女性',
                            'other' => 'その他'
                        ];
                        echo $genderLabels[$user->gender] ?? '未設定';
                    ?></td>
        </tr>
        <!-- <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('生年月日') ?></th>
            <td><?= h($user->birthday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('作成日') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('更新日') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>
