<?php
/* @var $this TaxistaController */
/* @var $model Taxista */

$this->breadcrumbs=array(
	'Taxistas'=>array('index'),
	$model->id_taxista=>array('view','id'=>$model->id_taxista),
	'Update',
);

$this->menu=array(
	array('label'=>'List Taxista', 'url'=>array('index')),
	array('label'=>'Create Taxista', 'url'=>array('create')),
	array('label'=>'View Taxista', 'url'=>array('view', 'id'=>$model->id_taxista)),
	array('label'=>'Manage Taxista', 'url'=>array('admin')),
);
?>

<h1>Update Taxista <?php echo $model->id_taxista; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>