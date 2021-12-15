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
            <input type="search" class="form-control rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary">search</button>
        </div>
        <?php if ($user) : ?>
            <?= $this->Html->link(__('Logout'), ['controller' => 'Employees', 'action' => 'logout'], ['class' => 'button float-right']) ?>
        <?php else : ?>
            <?= $this->Html->link(__('Login'), ['controller' => 'Employees', 'action' => 'login'], ['class' => 'button float-right']) ?>
        <?php endif; ?>
    </nav>


    
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <h1 class="display-4">Photo</h1>
        </div>

        <h2>Qui sommes nous </h2>
        <p>Sed ut perspiciatis unde omnis iste natus error sit
            voluptatem accusantium doloremque laudantium, totam
            rem aperiam, eaque ipsa quae ab illo inventore veritatis
            et quasi architecto beatae vitae dicta sunt explicabo.
            Nemo enim ipsam voluptatem quia voluptas sit aspernatur
            aut odit aut fugit, sed quia consequuntur magni dolores eos
            qui ratione voluptatem sequi nesciunt. Neque porro quisquam
            est, qui dolorem ipsum quia dolor sit amet, consectetur,
            adipisci velit, sed quia non numquam eius modi tempora incidunt
            ut labore et dolore magnam aliquam quaerat voluptatem.
            Ut enim ad minima veniam, quis nostrum exercitationem
        </p>

        <h2>Notre vision</h2>
        <p>Sed ut perspiciatis unde omnis iste natus error sit
            voluptatem accusantium doloremque laudantium, totam
            rem aperiam, eaque ipsa quae ab illo inventore veritatis
            et quasi architecto beatae vitae dicta sunt explicabo.
            Nemo enim ipsam voluptatem quia voluptas sit aspernatur
            aut odit aut fugit, sed quia consequuntur magni dolores eos
            qui ratione voluptatem sequi nesciunt. Neque porro quisquam
            est, qui dolorem ipsum quia dolor sit amet, consectetur,
            adipisci velit, sed quia non numquam eius modi tempora incidunt
            ut labore et dolore magnam aliquam quaerat voluptatem.
            Ut enim ad minima veniam, quis nostrum exercitationem
        </p>
    </div>

    <footer class="bg-dark mt-3 text-light p-4 text-center">
        Aboubacar Toure copyright 2021-2022
    </footer>

</body>

</html>