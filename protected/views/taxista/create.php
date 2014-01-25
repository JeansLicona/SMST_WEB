<?php
/* @var $this TaxistaController */
/* @var $model Taxista */

$this->breadcrumbs=array(
	'Taxistas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Taxista', 'url'=>array('index')),
	array('label'=>'Manage Taxista', 'url'=>array('admin')),
);
?>

<h1>Create Taxista</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>