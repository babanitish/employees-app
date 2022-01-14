<?php
//$this->disableAutoLayout();

?>
<main class="main container">
    <div class="home index content">
        <h1>Back office</h1>
        
        <ul>
            <li><?= $this->Html->link(__('Gérer les Départements'), ['controller' => 'Departments', 'action' => 'index', '_full' => true])?></li>
            <li><?= $this->Html->link(__('Gérer les Employés'), ['controller' => 'Employees', 'action' => 'index', '_full' => true])?></li>
            <li><?= $this->Html->link(__('Gérer les Offres d\'emploi'), ['controller' => 'Offers', 'action' => 'index', '_full' => true])?></li>    
        </ul>
    </div>
</main>