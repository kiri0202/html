<div class="login-container">
  <h1>ログイン</h1>

  <?= $this->Form->create() ?>
  <fieldset>
      <legend><?= __('メールアドレスとパスワードを入力してください') ?></legend>
      <?= $this->Form->control('email', ['label' => 'メールアドレス']) ?>
      <?= $this->Form->control('password', ['label' => 'パスワード']) ?>
      <button type="button" onclick="togglePassword('password')">表示/非表示</button>
  </fieldset>
  <?= $this->Form->button(__('ログイン')) ?>
  <?= $this->Form->end() ?>
  <p>
    <?= $this->Html->link('新規登録はこちら', ['action' => 'add']) ?>
  </p>
</div>
<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = (input.type === 'password') ? 'text' : 'password';
}
</script>
