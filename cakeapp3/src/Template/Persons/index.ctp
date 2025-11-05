<h3>List Persons</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Mail</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($persons as $person): ?>
        <tr>
            <td><?= h($person->id) ?></td>
            <td><?= h($person->name) ?></td>
            <td><?= h($person->age) ?></td>
            <td><?= h($person->mail) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="paginator">
    <?= $this->Paginator->first('« first') ?>
    <?= $this->Paginator->prev('< previous') ?>
    <?= $this->Paginator->numbers() ?>
    <?= $this->Paginator->next('next >') ?>
    <?= $this->Paginator->last('last »') ?>
</div>
<p>
    <?= $this->Paginator->counter(['format' => 'Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total']) ?>
</p>
