<?php if (!defined('FW')) die('Forbidden');

$cfg = array(
	'page_builder' => array(
		'tab'         => __('Layout Elements', 'fw'),
		'title'       => __('Секция', 'fw'),
		'title_template' => '{{- title }}: {{= o["backend_name"] }}',
		'description' => __('Add a Section', 'fw'),
		'type'        => 'section', // WARNING: Do not edit this
	)
);