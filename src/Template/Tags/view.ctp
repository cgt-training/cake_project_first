<nav class="col-lg-3 col-sm-4 columns side-menu" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading side-heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id],['class'=>'side-list-content']) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id), 'class'=>'side-list-content']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index'],['class'=>'side-list-content']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add'],['class'=>'side-list-content']) ?> </li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index'],['class'=>'side-list-content']) ?> </li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add'],['class'=>'side-list-content']) ?> </li>
    </ul>
</nav>
<div class="tags view col-lg-8 col-sm-7 columns content main-content-list-data">
    <h3 class='legend-list-heading'><?= h($tag->title) ?></h3>
    <table class="vertical-table table-style">
        <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('Title') ?></th>
            <td class='col-lg-3 text-right'><?= h($tag->title) ?></td>
        </tr>
        <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('Id') ?></th>
            <td class='col-lg-3 text-right'><?= $this->Number->format($tag->id) ?></td>
        </tr>
         <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('Created') ?></th>
            <td class='col-lg-3 text-right'><?= h($tag->created) ?></td>
        </tr>
         <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('Modified') ?></th>
            <td class='col-lg-3 text-right'><?= h($tag->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4 class="legend-list-sub-heading"><?= __('Related Bookmarks') ?></h4>
        <?php if (!empty($tag->bookmarks)): ?>
        <table cellpadding="0" cellspacing="0">
           <tr class="table-heading-style">
                <th scope="col" class="col-lg-1 table-row"><?= __('Id') ?></th>
                <th scope="col" class="col-lg-2 table-row"><?= __('User Id') ?></th>
                <th scope="col" class="col-lg-1 table-row"><?= __('Twit') ?></th>
                <th scope="col" class="col-lg-1 table-row"><?= __('Description') ?></th>
                <th scope="col" class="col-lg-1 table-row"><?= __('Url') ?></th>
                <th scope="col" class="col-lg-2 table-row"><?= __('Created') ?></th>
                <th scope="col" class="col-lg-1 table-row"><?= __('Updated') ?></th>
                <th scope="col" class="actions col-lg-3 table-row"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->bookmarks as $bookmarks): ?>
            <tr class="table-border-style">
                <td class="col-lg-1 table-row"><?= h($bookmarks->id) ?></td>
                <td class="col-lg-1 table-row"><?= h($bookmarks->user_id) ?></td>
                <td class="col-lg-1 table-row"><?= h($bookmarks->twit) ?></td>
                <td class="col-lg-1 table-row"><?= h($bookmarks->description) ?></td>
                <td class="col-lg-1 table-row"><?= h($bookmarks->url) ?></td>
                <td class="col-lg-2 table-row"><?= h($bookmarks->created) ?></td>
                <td class="col-lg-1 table-row"><?= h($bookmarks->updated) ?></td>
                <td class="actions col-lg-3 table-row">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bookmarks', 'action' => 'view', $bookmarks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bookmarks', 'action' => 'edit', $bookmarks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bookmarks', 'action' => 'delete', $bookmarks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookmarks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
