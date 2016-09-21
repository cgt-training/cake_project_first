<nav class="col-lg-3 col-sm-4 columns side-menu" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading side-heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add'],['class'=>'side-list-content']) ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index'],['class'=>'side-list-content']) ?></li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add'],['class'=>'side-list-content']) ?></li>
    </ul>
</nav>
<div class="tags index col-lg-8 col-sm-7 columns content main-content-list-data">
    <h3 class='legend-list-heading'><?= __('Tags') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr class="table-heading-style">
                <th scope="col" class="col-lg-2 table-row"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" class="col-lg-2 table-row"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col" class="col-lg-2 table-row"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="col-lg-2 table-row"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions col-lg-2 table-row"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tags as $tag): ?>
            <tr class="table-border-style">
                <td class="col-lg-2 table-row"><?= $this->Number->format($tag->id) ?></td>
                <td class="col-lg-2 table-row"><?= h($tag->title) ?></td>
                <td class="col-lg-2 table-row"><?= h($tag->created) ?></td>
                <td class="col-lg-2 table-row"><?= h($tag->modified) ?></td>
                <td class="actions col-lg-2 table-row">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tag->id],['class'=>'link-style']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tag->id],['class'=>'link-style']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id),'class'=>'link-style']) ?>
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
