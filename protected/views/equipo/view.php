<?php
/* @var $this EquipoController */
/* @var $model Equipo */

$this->breadcrumbs=array(
	'Equipos'=>array('index'),
	$model->id_equipo,
);
$this->pageTitle=Yii::app()->name.' - Ver Equipo';
$this->menu=array(
	array('label'=>'Listar Equipo', 'url'=>array('index')),
	array('label'=>'Registrar Equipo', 'url'=>array('create')),
	array('label'=>'Editar Equipo', 'url'=>array('update', 'id'=>$model->id_equipo)),
	array('label'=>'Administrar Equipo', 'url'=>array('admin')),
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
