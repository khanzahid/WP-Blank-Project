<!DOCTYPE html>
<html lang="en">
<head>

<title><?php wp_title('|',true,'right'); ?> <?php bloginfo('name'); ?> </title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="description" content="Blank theme" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="site-wrap">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		    <div class="container">
		      <a class="navbar-brand" href="#">Blank Theme</a>
		      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
		        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		      </button>
		      <div class="collapse navbar-collapse" id="navbarNav">
		        <ul class="navbar-nav">
		          <li class="nav-item">
		            <a class="nav-link" href="<?=get_home_url();?>">Home</a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" href="<?=get_home_url();?>/projects">Projects Archive page</a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" href="<?=get_home_url();?>/json-dataa/">Ajax Req(Projects) </a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" href="<?=get_home_url();?>/coffee-quotes/">Quotes</a>
		          </li>
		        </ul>
		      </div>
		    </div>
	  </nav>
	<div class="container">
