<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('メニュー') ?></li>
        <li><?= $this->Form->postLink(
                __('社員削除'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('本当に削除しますか？ # {0}', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('社員一覧'), ['action' => 'index']) ?></li>
    </ul>
</nav>

<div class="users form large-9 medium-8 columns content">
    <h1>社員情報を編集</h1>

    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend>編集内容を入力してください</legend>

        <?= $this->Form->control('name', [
            'label' => '名前'
        ]) ?>
        <?= $this->Form->control('birthday', [
            'label' => '生年月日',
            'type' => 'date',
            'dateWidget' => 'select',   // select に固定
            'yearRange' => [1900, date('Y')]
        ]) ?>
        <?= $this->Form->control('email', [
            'label' => 'メールアドレス'
        ]) ?>
        <?= $this->Form->control('gender', [
            'label' => '性別',
            'type' => 'select',
            'options' => [
                'male' => '男性',
                'female' => '女性',
                'other' => 'その他'
            ]
        ]) ?>
    </fieldset>
    <?= $this->Form->button('更新') ?>
    <?= $this->Form->end() ?>
</div>
