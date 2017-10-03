<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'backend_name' => array(
		'label'        => __('Название секции', 'fw'),
		'desc'  => __('(Відібражається тільки в редакторі, для зручності', 'fw'),
		'type'         => 'text',
	),
	'is_fullwidth' => array(
		'label'        => __('Full Width', 'fw'),
		'type'         => 'switch',
	),
	'is_collage' => array(
		'label'        => __('Это будет коллаж?', 'fw'),
		'type'         => 'switch',
	),
	'custom_class' => array(
		'label' => __('Custom section class', 'fw'),
		'desc'  => __('Enter section class', 'fw'),
		'type'  => 'text',
	),
	'background_color' => array(
		'label' => __('Background Color', 'fw'),
		'desc'  => __('Please select the background color', 'fw'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => __('Background Image', 'fw'),
		'desc'    => __('Please select the background image', 'fw'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'video' => array(
		'label' => __('Background Video', 'fw'),
		'desc'  => __('Insert Video URL to embed this video', 'fw'),
		'type'  => 'text',
	),
	'datas' => array(
		'label' => __('Доп. атрібути', 'fw'),
		'desc'  => __('(для разработчика)', 'fw'),
		'type'  => 'text',
	)
);
