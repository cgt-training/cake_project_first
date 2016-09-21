<nav class="col-lg-3 medium-4 columns side-menu" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading side-heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bookmark'), ['action' => 'edit', $bookmark->id],['class'=>'side-list-content']) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bookmark'), ['action' => 'delete', $bookmark->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookmark->id), 'class'=>'side-list-content']) ?> </li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['action' => 'index'],['class'=>'side-list-content']) ?> </li>
        <li><?= $this->Html->link(__('New Bookmark'), ['action' => 'add'],['class'=>'side-list-content']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'],['class'=>'side-list-content']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'],['class'=>'side-list-content']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index'],['class'=>'side-list-content']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add'],['class'=>'side-list-content']) ?> </li>
    </ul>
</nav>
<div class="bookmarks view col-lg-8 medium-7 columns content main-content-list-data">
    <h3 class='legend-list-heading'><?= h($bookmark->id) ?></h3>
    <table class="vertical-table table-style">
        <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('User') ?></th>
            <td class='col-lg-3 text-right'><?= $bookmark->has('user') ? $this->Html->link($bookmark->user->id, ['controller' => 'Users', 'action' => 'view', $bookmark->user->id]) : '' ?></td>
        </tr>
        <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('Twit') ?></th>
            <td class='col-lg-3 text-right'><?= h($bookmark->twit) ?></td>
        </tr>
        <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('Id') ?></th>
            <td class='col-lg-3 text-right'><?= $this->Number->format($bookmark->id) ?></td>
        </tr>
        <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('Created') ?></th>
            <td class='col-lg-3 text-right'><?= h($bookmark->created) ?></td>
        </tr>
        <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('Updated') ?></th>
            <td class='col-lg-3 text-right'><?= h($bookmark->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4 class='legend-list-heading legend-underline'><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($bookmark->description)); ?>
    </div>
    <div class="row">
        <h4 class='legend-list-heading legend-underline'><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($bookmark->url)); ?>
    </div>
    <div class="related">
        <h4 class="legend-list-sub-heading"><?= __('Related Tags') ?></h4>
        <?php if (!empty($bookmark->tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr class="table-heading-style">
                <th scope="col" class="col-lg-2 table-row"><?= __('Id') ?></th>
                <th scope="col" class="col-lg-2 table-row"><?= __('Title') ?></th>
                <th scope="col" class="col-lg-2 table-row"><?= __('Created') ?></th>
                <th scope="col" class="col-lg-2 table-row"><?= __('Modified') ?></th>
                <th scope="col" class="col-lg-2 table-row actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bookmark->tags as $tags): ?>
            <tr class="table-border-style">
                <td class="col-lg-2 table-row"><?= h($tags->id) ?></td>
                <td class="col-lg-2 table-row"><?= h($tags->title) ?></td>
                <td class="col-lg-2 table-row"><?= h($tags->created) ?></td>
                <td class="col-lg-2 table-row"><?= h($tags->modified) ?></td>
                <td class="col-lg-2 table-row actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tags->id],['class'=>'link-style']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tags->id],['class'=>'link-style']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tags', 'action' => 'delete', $tags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->id), 'class'=>'link-style']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
