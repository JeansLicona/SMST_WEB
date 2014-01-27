<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */

$this->breadcrumbs=array(
	'Solicituds'=>array('index'),
	$model->id_solicitud,
);

$this->menu=array(
	array('label'=>'List Solicitud', 'url'=>array('index')),
	array('label'=>'Create Solicitud', 'url'=>array('create')),
	array('label'=>'Update Solicitud', 'url'=>array('update', 'id'=>$model->id_solicitud)),
	array('label'=>'Delete Solicitud', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_solicitud),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Solicitud', 'url'=>array('admin')),
);
?>

<h1>View Solicitud #<?php echo $model->id_solicitud; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_solicitud',
		'fk_taxista',
		'fk_usuario',
		'latitud_solicitud',
		'longitud_solicitud',
		'estado_solicitud',
		'hora_fecha_solicitud',
		'costo_solcitud',
	),
)); ?>
