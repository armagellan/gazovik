<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'custom_class' => array(
		'label' => __('Custom section class', 'fw'),
		'desc'  => __('Enter section class', 'fw'),
		'type'  => 'text',
	),
	'datas' => array(
		'label' => __('Доп. атрибуты', 'fw'),
		'desc'  => __('вроде data-wow-delay', 'fw'),
		'type'  => 'text',
	)
);
