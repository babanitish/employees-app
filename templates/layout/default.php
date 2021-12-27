<?php
$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="App Development">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>seo 1</title>
    <!--<link rel="stylesheet" href="./css/nicepage.css" media="screen">-->
	<!--<link rel="stylesheet" href="css/nicepage_index.css" media="screen">-->
    <!--<script class="u-script" type="text/javascript" src="/webroot/js/jquery-1.9.1.min.js" defer=""></script>-->
    <!--<script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>-->
    <meta name="generator" content="Nicepage 4.0.14, nicepage.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Oswald:200,300,400,500,600,700">
 	
    <?= $this->Html->css('default'); ?>
    <?= $this->Html->css('nicepage'); ?>
    <?= $this->Html->css('nicepage_index'); ?>
    <?= $this->Html->script('jquery-1.9.1.min.js'); ?>
    <?= $this->Html->script('nicepage'); ?>
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/default-logo.png",
		"sameAs": []
}</script>
    <meta name="theme-color" content="#494399">
    <meta property="og:title" content="seo 1">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
  	<header class="u-align-center-sm u-align-center-xs u-clearfix u-header u-palette-1-base u-header" id="sec-05fe">
  		<div class="u-clearfix u-sheet u-sheet-1">
            <a href="https://nicepage.com" class="u-image u-logo u-image-1" data-image-width="80" data-image-height="40">
              <?= $this->Html->image('home/default-logo.png', ['class'=>"u-logo-image u-logo-image-1", 'data-image-width'=>"63"])?>
            </a>            
            <div class="u-social-icons u-spacing-10 u-social-icons-1">
                  <?= $this->Html->link(
                        'Home',
                      ['controller' => 'page', 'action' => 'home'],
                        ['class'=>'u-social-url']
                  )?>
                  <?= $this->Html->link(
                        'Departments',
                      ['controller' => 'Departments', 'action' => 'index'],
                        ['class'=>'u-social-url']
                  )?>
    
                  <?= $this->Html->link(
                        'Women At Work',
                        ['controller' => 'WomenAtWork', 'action' => 'indexWomen'],
                        ['class'=>'u-social-url']
                  )?>
                  <?= $this->Html->link(
                        'Partners',
                      '/partners',
                        ['class'=>'u-social-url']
                  )?>
                   <?= $this->Html->link(
                        'Job offers',
                      '#',
                        ['class'=>'u-social-url']
                  )?>
            </div>
        </div>
    </header>
    
    <main class="main <?= ($this->request->getAttribute('params')['controller']!='Page' || $this->request->getAttribute('params')['action']!='home') ? 'container' : '' ?>">
    		

            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>

    </main>
    
    
    
    
  </body>
</html>