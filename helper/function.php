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

//生成文章的网页描述
function generateDescription($text){
	$text = strip_tags($text);
	$text = preg_replace('/(&.*;)|\s/iU', '', $text);
	$text = mb_substr($text, 0, 100, 'UTF-8');
	return $text;
}
