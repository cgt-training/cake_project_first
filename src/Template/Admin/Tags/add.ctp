<nav class="col-lg-3 col-sm-4 columns side-menu" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading side-heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index'],['class'=>'side-list-content']) ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index'],['class'=>'side-list-content']) ?></li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add'],['class'=>'side-list-content']) ?></li>
    </ul>
</nav>
<div class="tags form col-lg-8 col-sm-7 columns content main-content-list-data">
    <?= $this->Form->create($tag) ?>
    <fieldset>
        <legend class="legend-style"><?= __('Add Tag') ?></legend>
        
        <div class = 'input-style-block'>
            <?php  echo $this->Form->label('title'); ?>
        </div>
        <?php echo $this->Form->input('title', ['label' => false, 'class' => 'input-style-content']); ?>

        <div class = 'input-style-block'>
            <?php  echo $this->Form->label('bookmarks._ids'); ?>
        </div>
        <?php echo $this->Form->input('bookmarks._ids', ['options' => $bookmarks, 'label' => false, 'class' => 'input-style-content']); ?>

    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'input-style-button']) ?>
    <?= $this->Form->end() ?>
</div>
