<nav class="col-lg-3 col-sm-4 columns side-menu" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading side-heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bookmark'), ['action' => 'add'],['class'=>'side-list-content']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'],['class'=>'side-list-content']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'],['class'=>'side-list-content']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index'],['class'=>'side-list-content']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add'],['class'=>'side-list-content']) ?></li>
    </ul>
</nav>
<div class="bookmarks index col-lg-8 col-sm-7 columns content main-content-list-data">
    <h3 class='legend-list-heading'><?= __('Bookmarks') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table-style">
        <thead>
            <tr class="table-heading-style">
                <th scope="col" class="col-lg-1 table-row"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" class="col-lg-1 table-row"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="col-lg-2 table-row"><?= $this->Paginator->sort('twit') ?></th>
                <th scope="col" class="col-lg-3 table-row"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="col-lg-2 table-row"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions col-lg-3 table-row"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookmarks as $bookmark): ?>
            <tr class="table-border-style">
                <td class="col-lg-1 table-row"><?= $this->Number->format($bookmark->id) ?></td>
                <td class="col-lg-1 table-row"><?= $bookmark->has('user') ? $this->Html->link($bookmark->user->id, ['controller' => 'Users', 'action' => 'view', $bookmark->user->id]) : '' ?></td>
                <td class="col-lg-2 table-row"><?= h($bookmark->twit) ?></td>
                <td class="col-lg-3 table-row"><?= h($bookmark->created) ?></td>
                <td class="col-lg-2 table-row"><?= h($bookmark->updated) ?></td>
                <td class="actions col-lg-3 table-row">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bookmark->id],['class'=>'link-style']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bookmark->id],['class'=>'link-style']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bookmark->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookmark->id),'class'=>'link-style']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator text-center">
        <ul class="pagination">
            <?= $this->Paginator->first('< first') ?>
            <?= $this->Paginator->prev('<< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >>') ?>
            <?= $this->Paginator->last('last >') ?>
        </ul>
        <p class="text-right"><?= $this->Paginator->counter() ?></p>
    </div>
    <?= $this->Html->link(__('ok'), ['action' => 'testWasim'],['class'=>'input-style-button']) ?>
</div>
