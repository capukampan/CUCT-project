<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<!--<link href="<?=URL; ?>public/css/bootstrap/css/bootstrap.css" rel="stylesheet"/>-->
		<link href="<?=URL; ?>public/css/register.css" rel="stylesheet"/>
		<link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"/>
		<link href="<?=URL; ?>public/js/iCheck-master/skins/minimal/blue.css" rel="stylesheet"/>
		<link rel="stylesheet" href="<?=URL; ?>public/js/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
		
		<?php if(isset($this->css)): 
			foreach ($this->css as $css) {  ?>
			<link href="<?=URL; ?>views/<?=$css ?>" rel="stylesheet"/>
		
		<? } endif; ?>

		<!--<script type="text/javascript" src="<?=URL; ?>public/js/jquery-1.11.1.min.js"></script>-->
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js"></script>
		<script src="<?=URL; ?>public/js/iCheck-master/icheck.js"></script>

		<script type="text/javascript" src="<?=URL; ?>public/js/moment.js"></script>
		<!--<script type="text/javascript" src="<?=URL; ?>public/css/bootstrap/bootstrap/js/transition.js"></script>
		<script type="text/javascript" src="<?=URL; ?>public/css/bootstrap/bootstrap/js/collapse.js"></script>
		<script type="text/javascript" src="<?=URL; ?>public/css/bootstrap/bootstrap/dist/bootstrap.min.js"></script>-->
		<script type="text/javascript" src="<?=URL; ?>public/js/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
		<?php
			if(isset($this->js)): 
			foreach ($this->js as $js) { ?>
			<script type="text/javascript" src="<?=URL; ?>views/<?=$js ?>"></script>

		<?	} endif; ?>

		<?php if(isset($this->title)): ?>
			<title><?=$this->title?></title>
		<? endif; ?>
		
	</head>
	<body>