<?php
/* @var $this EquipoController */
/* @var $model Equipo */

$this->breadcrumbs=array(
	'Equipos'=>array('index'),
	$model->id_equipo=>array('view','id'=>$model->id_equipo),
	'Editar',
);
$this->pageTitle=Yii::app()->name.' - Actualizar Equipo';
$this->menu=array(
	array('label'=>'Listar Equipo', 'url'=>array('index')),
	array('label'=>'Registrar Equipo', 'url'=>array('create')),
	array('label'=>'Ver Equipo', 'url'=>array('view', 'id'=>$model->id_equipo)),
	array('label'=>'Administrar Equipo', 'url'=>array('admin')),
);
?>

<h1>Editar Equipo <?php echo $model->id_equipo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>