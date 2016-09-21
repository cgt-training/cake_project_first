<nav class="col-lg-2 col-sm-4 columns side-menu" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading side-heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add'],['class'=>'side-list-content']) ?></li>
         <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index'],['class'=>'side-list-content']) ?></li>
    </ul>
</nav>
<div class="users index col-lg-10 col-sm-8 columns content main-content-list-data">
    <h3 class='legend-list-heading'><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table-style">
        <thead>
            <tr class="table-heading-style">
                <th scope="col" class="col-lg-1 table-row"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" class="col-lg-1 table-row"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col" class="col-lg-1 table-row"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col" class="col-lg-1 table-row"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col" class="col-lg-2 table-row"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="col-lg-2 table-row"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions col-lg-3 table-row"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr class="table-border-style">
                <td class="col-lg-1 table-row"><?= $this->Number->format($user->id) ?></td>
                <td class="col-lg-1 table-row"><?= h($user->username) ?></td>
                 <td class="col-lg-1 table-row"><?= h($user->email) ?></td>
                <td class="col-lg-1 table-row"><?= h($user->password) ?></td>
                <td class="col-lg-2 table-row"><?= h($user->created) ?></td>
                <td class="col-lg-2 table-row"><?= h($user->modified) ?></td>
                <td class="actions col-lg-3 table-row">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id],['class'=>'link-style']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id],['class'=>'link-style']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class'=>'link-style']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator text-center">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p class="text-right"><?= $this->Paginator->counter() ?></p>
    </div>
</div>
