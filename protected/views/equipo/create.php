<?php
/* @var $this EquipoController */
/* @var $model Equipo */

$this->breadcrumbs=array(
	'Equipos'=>array('index'),
	'Registrar',
);
$this->pageTitle=Yii::app()->name.' - Registrar Equipo';
$this->menu=array(
	array('label'=>'Listar Equipo', 'url'=>array('index')),
	array('label'=>'Administrar Equipo', 'url'=>array('admin')),
);
?>

<h1>Registrar Equipo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>