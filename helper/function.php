<?php

function pr($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

function pre($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
	exit;
}

function vd($data)
{
	echo '<pre>';
	var_dump($data);
	echo '</pre>';

}

function vde($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';
	exit;
}