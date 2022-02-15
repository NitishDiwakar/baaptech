<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $group->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Groups'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Group'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="groups view content">
            <h3><?= h($group->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($group->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Wa Link') ?></th>
                    <td><?= h($group->wa_link) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tel Link') ?></th>
                    <td><?= h($group->tel_link) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($group->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Approved') ?></th>
                    <td><?= $this->Number->format($group->is_approved) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($group->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($group->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
