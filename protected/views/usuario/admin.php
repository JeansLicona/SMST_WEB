<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Administrar',
);
$this->pageTitle=Yii::app()->name.' - Administrar Usuarios';

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Registrar Usuario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Usuarios</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id_usuario',
		'nombre_usuario',
		'apellido_usuario',
		'username',
		
		'tipo_usuario',
		/*
		'activo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
