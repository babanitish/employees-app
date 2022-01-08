<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeptManager $deptManager
 */
?>

<div class="deptManager form content">
    <?= $this->Form->create($deptManager) ?>
        <legend><?= __('Nommer Un Manager Pour Le Departement '.$dept_no) ?></legend>
        <?= $this->Form->text('emp_no', ['placeholder'=> __('Numero d\'employé')]);?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
