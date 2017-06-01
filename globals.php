<?php


$is_cli = false;

if (PHP_SAPI == 'cli') {
	$is_cli = true;
}

function v($var, $depth = 10, $highlight = true)
{
	VarDumper::dump($var, $depth, $highlight);
}

function d($var)
{
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}

function dd($var)
{
	global $is_cli;
	echo $is_cli?'':'<pre>';
	var_dump($var);
	echo $is_cli?'':'</pre>';
	die;
}

function vd($var, $depth = 10, $highlight = true)
{
	VarDumper::dump($var, $depth, $highlight);
	die;
}

function ed($var)
{
	echo $var;
	die;
}
