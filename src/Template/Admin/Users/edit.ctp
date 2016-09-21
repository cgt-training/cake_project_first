<nav class="col-lg-3 col-sm-4 columns side-menu" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading side-heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class'=>'side-list-content']
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index'],['class'=>'side-list-content']) ?></li>
         <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index'],['class'=>'side-list-content']) ?></li>
    </ul>
</nav>
<div class="users form col-lg-8 col-sm-7 columns content main-content-data">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend class="legend-style"><?= __('Edit User') ?></legend>
        
         <div class = 'input-style-block'>
            <?php  echo $this->Form->label('username'); ?>
        </div>
        <?php echo $this->Form->input('username', ['label' => false, 'class' => 'input-style-content']);?>

        <div class = 'input-style-block'>
            <?php  echo $this->Form->label('email'); ?>
        </div>
        <?php echo $this->Form->input('email', ['label' => false, 'class' => 'input-style-content']);?>

        <div class = 'input-style-block'>
            <?php  echo $this->Form->label('password'); ?>
        </div>
        <?php echo $this->Form->input('password', ['label' => false, 'class' => 'input-style-content']); ?>

         <div class = 'input-style-block'>
            <?php  echo $this->Form->label('role'); ?>
        </div>
        <?php echo $this->Form->input('role', ['label' => false, 'class'=>'input-style-content','options'=>['admin'=>'Admin','user'=>'User'], ['default' => $user->role]]); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'input-style-button']) ?>
    <?= $this->Form->end() ?>
</div>
