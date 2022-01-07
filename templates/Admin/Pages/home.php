<?php
//$this->disableAutoLayout();

?>

<h1>Back office</h1>

<ul>
    <li><?= $this->Html->link(__('G�rer les D�partments'), ['controller' => 'Departments', 'action' => 'index', '_full' => true])?></li>
    <li><?= $this->Html->link(__('G�rer les Employ�s'), ['controller' => 'Employees', 'action' => 'index', '_full' => true])?></li>
    <li><?= $this->Html->link(__('G�rer les Demandes des Employ�s'), ['controller' => 'Demands', 'action' => 'index', '_full' => true])?></li>
    <li><?= $this->Html->link(__('G�rer les Fonctions'), ['controller' => 'Titles', 'action' => 'index', '_full' => true])?></li>
    <li><?= $this->Html->link(__('G�rer les offres d\'emploi'), ['controller' => 'Offers', 'action' => 'index', '_full' => true])?></li>    
    <li><?= $this->Html->link(__('G�rer le Menu Principal'), ['controller' => 'Menu', 'action' => 'index', '_full' => true])?></li>    
</ul>
