<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
// echo $this->request->getSession()->read('user_id');
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?php // echo "string"; ?>
            <?php // echo $this->request->getSession()->read('user_id'); ?>
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Login') ?></legend>
                <?php
                    // echo $this->Form->control('Name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                ?>
            </fieldset>
            <?= $this->Form->button(__('login')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
