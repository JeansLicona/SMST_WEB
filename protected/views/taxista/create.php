<?php
/* @var $this TaxistaController */
/* @var $model Taxista */

$this->breadcrumbs=array(
	'Taxistas'=>array('index'),
	'Registrar',
);

$this->menu=array(
	array('label'=>'Listar Taxistas', 'url'=>array('index')),
	array('label'=>'Administrar Taxistas', 'url'=>array('admin')),
);
?>

<h1>Registrar Taxista</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>