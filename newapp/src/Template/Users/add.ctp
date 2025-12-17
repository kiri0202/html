<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('社員リスト'), ['action' => 'index']) ?></li>
    </ul>
</nav>

<div class="users form large-9 medium-8 columns content">
    <h1>社員情報追加</h1>

    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend>社員情報を入力してください</legend>

        <?= $this->Form->control('name', ['label' => '名前']) ?>

        <?= $this->Form->control('birthday', [
            'label' => '生年月日',
            'type' => 'date',
            'minYear' => 1900,
            'maxYear' => date('Y'),
            'monthNames' => [
                1 => '1月', 2 => '2月', 3 => '3月', 4 => '4月',
                5 => '5月', 6 => '6月', 7 => '7月', 8 => '8月',
                9 => '9月', 10 => '10月', 11 => '11月', 12 => '12月'
            ],
            'empty' => ['year' => '年', 'month' => '月', 'day' => '日']
        ]) ?>

        <?= $this->Form->control('email', ['label' => 'メールアドレス']) ?>

        <?= $this->Form->control('email_confirm', [
            'label' => 'メールアドレス（確認）',
            'type' => 'email',
            'required' => true
        ]) ?>

        <?= $this->Form->control('gender', [
            'label' => '性別',
            'type' => 'select',
            'options' => ['male' => '男性', 'female' => '女性', 'other' => 'その他']
        ]) ?>

        <?= $this->Form->control('password', [
            'label' => 'パスワード',
            'type' => 'password',
            'id' => 'password',
            'required' => true,
            'templates' => [
                'inputContainerError' => '<div class="error">{{content}}{{error}}</div>'
            ]
        ]) ?>
        <button type="button" onclick="togglePassword('password')">表示/非表示</button>

        <?= $this->Form->control('password_confirm', [
            'label' => 'パスワード確認',
            'type' => 'password',
            'id' => 'password_confirm',
            'required' => true
        ]) ?>
        <button type="button" onclick="togglePassword('password_confirm')">表示/非表示</button>

    </fieldset>

    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = (input.type === 'password') ? 'text' : 'password';
}
</script>
