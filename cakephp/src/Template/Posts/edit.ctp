<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $post->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $post->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($post); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Post']) ?></legend>
    <?php
    echo $this->Form->control('title');
    echo $this->Form->control('content');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
