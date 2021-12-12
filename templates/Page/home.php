<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">

                <li class="nav-item active">
                    <a class="nav-link" href=<?= $this->Url->build(['controller' => 'employees', 'action' => 'index']); ?>>Home</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href=<?= $this->Url->build(['controller' => 'departments', 'action' => 'index']); ?>>Departments</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href=<?= $this->Url->build(['controller' => 'page', 'action' => 'about']); ?>>About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=<?= $this->Url->build(['controller' => 'page', 'action' => 'contact']); ?>>Contact</a>
                </li>
            </ul>
        </div>
        <div class="input-group">
  <input type="search" class="form-control rounded " placeholder="Search" aria-label="Search"
  aria-describedby="search-addon" />
  <button type="button" class="btn btn-outline-primary">search</button>
</div>
<?php if($user) : ?>
<?= $this->Html->link(__('Logout'), ['controller' => 'Employees','action' => 'logout'], ['class' => 'button float-right']) ?>
<?php else : ?>
<?= $this->Html->link(__('Login'), ['controller' => 'Employees','action' => 'login'], ['class' => 'button float-right']) ?>
<?php endif ; ?>
    </nav>


    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Banner de l'entreprise</h1>
            <p class="lead">Slogan de l'entreprise.</p>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-4">
                <h3 style="color: #fff;" class="bg-info text-capitalize p-1">Communiqués de presse</h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#">Cras justo odio</a></li>
                    <li class="list-group-item"><a href="#">Dapibus ac facilisis in</a></li>
                    <li class="list-group-item"><a href="#">Morbi leo risus</a></li>
                    <li class="list-group-item"><a href="#">Porta ac consectetur ac</a></li>
                    <li class="list-group-item"><a href="#">Vestibulum at eros</a></li>
                </ul>
            </div>

            <div class="col-8">
                <div class="row">
                    <div class="list-group ">
                        <a href="#" class="list-group-item list-group-item-action flex-column mb-2">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small>3 days ago</small>
                            </div>
                            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                            <small>Donec id elit non mi porta.</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action flex-column mb-2">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                            <small class="text-muted">Donec id elit non mi porta.</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                            <small class="text-muted">Donec id elit non mi porta.</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>

    <footer class="bg-dark mt-3 text-light p-4 text-center">
        Aboubacar Toure copyright 2021-2022   <?= $imgQrCode ?>
        
        
    </footer>

</body>

</html>