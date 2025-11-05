<div>
    <h3>Index Page</h3>
    <p><?= $message ?></p>
    <?=$this->Form->create(null,[
        'type' => 'post',
        'url' => ['controller' => 'Helo', 'action' => 'index']]
    ) ?>
    <?=$this->Form->text('text1') ?>
    <?=$this->Form->submit('OK') ?>
    <?=$this->Form->end() ?>
   <?=$this->Form->textarea( '' ) ?>
   <?=$this->Form->password( '' ) ?>
   <?=$this->Form->radio('radio',[
        ['value'=>'男','text'=>'male','checked'=>true],
        ['value'=>'女','text'=>'female']
    ]) ?>
    <div>
    <h3>Index Page</h3>
    <p><?= $message ?></p>
    <?=$this->Form->create(null,[
        'type' => 'post',
        'url' => ['controller' => 'Helo', 'action' => 'index']]
    ) ?>
    <?=$this->Form->date('date',[
        'year'=>['style'=>'width:100px;'],
        'month'=>['style'=>'width:100px;'],
        'day'=>['style'=>'width:100px;']
    ]) ?>
    <hr>
    <?=$this->Form->time('time',[
        'interval'=>5,
        'hour'=>['style'=>'width:100px;']
    ]) ?>
    <?=$this->Form->submit('OK') ?>
    <?=$this->Form->end() ?>
    </form>
</div>
    </form>
</div>
<div>
    <h1>Index Page</h1>
    <p><?= $message ?></p>
</div>