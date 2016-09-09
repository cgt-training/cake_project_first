
<nav class="col-lg-3 col-sm-4 columns side-menu" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading side-heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['action' => 'index'],['class'=>'side-list-content']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'],['class'=>'side-list-content']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'],['class'=>'side-list-content']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index'],['class'=>'side-list-content']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add'],['class'=>'side-list-content']) ?></li>
    </ul>
</nav>
<div class="bookmarks form col-lg-8 col-sm-7 columns content main-content-data">
    <?= $this->Form->create($bookmark) ?>
    <fieldset>
        <legend class="legend-style"><?= __('Add Bookmark') ?></legend>
        
            <div class = 'input-style-block'>
            <?php  echo $this->Form->label('User'); ?>
            </div>
            <?php  echo $this->Form->input('user_id', ['options' => $users, 'label' => false, 'class' => 'input-style-content']); ?>
           
            <div class = 'input-style-block'>
                <?php  echo $this->Form->label('twit'); ?>
            </div>
            <?php echo $this->Form->input('twit', ['label' => false, 'class' => 'input-style-content']); ?>
            

            <div class = 'input-style-block'>
                <?php  echo $this->Form->label('description'); ?>
            </div>
            <?php echo $this->Form->input('description', ['label' => false, 'class' => 'input-style-content']); ?>

            <div class = 'input-style-block'>
                <?php  echo $this->Form->label('url'); ?>
            </div>
            <?php echo $this->Form->input('url', ['label' => false, 'class' => 'input-style-content']); ?>

            <div class = 'input-style-block'>
                <?php  echo $this->Form->label('tags_ids'); ?>
            </div>
            <?php echo $this->Form->input('tags._ids', ['options' => $tags, 'label' => false, 'class' => 'input-style-content']); ?>
       
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'input-style-button']) ?>
    <?= $this->Form->end() ?>
</div>
