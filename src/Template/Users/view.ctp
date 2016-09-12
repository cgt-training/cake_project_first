<nav class="col-lg-3 col-sm-4 columns side-menu" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading side-heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id],['class'=>'side-list-content']) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class'=>'side-list-content']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index'],['class'=>'side-list-content']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add'],['class'=>'side-list-content']) ?> </li>
    </ul>
</nav>
<div class="users view col-lg-8 col-sm-7 columns content main-content-list-data">
    <h3 class='legend-list-heading'><?= h($user->id) ?></h3>
    <table class="vertical-table table-style">
        <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('Email') ?></th>
            <td class='col-lg-3 text-right'><?= h($user->email) ?></td>
        </tr>
        <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('Password') ?></th>
            <td class='col-lg-3 text-right'><?= h($user->password) ?></td>
        </tr>
        <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('Id') ?></th>
            <td class='col-lg-3 text-right'><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('Created') ?></th>
            <td class='col-lg-3 text-right'><?= h($user->created) ?></td>
        </tr>
        <tr class="table-border-style">
            <th scope="row" class='col-lg-9 view-content-style'><?= __('Modified') ?></th>
            <td class='col-lg-3 text-right'><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>
