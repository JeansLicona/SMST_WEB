<?php
/* @var $this EquipoController */
/* @var $model Equipo */

$this->breadcrumbs=array(
	'Equipos'=>array('index'),
	$model->id_equipo,
);

$this->menu=array(
	array('label'=>'List Equipo', 'url'=>array('index')),
	array('label'=>'Create Equipo', 'url'=>array('create')),
	array('label'=>'Update Equipo', 'url'=>array('update', 'id'=>$model->id_equipo)),
	array('label'=>'Delete Equipo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_equipo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Equipo', 'url'=>array('admin')),
);
?>

<h1>View Equipo #<?php echo $model->id_equipo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_equipo',
		'modelo_equipo',
		'marca_equipo',
		'fecha_compra',
		'activo',
	),
)); ?>
