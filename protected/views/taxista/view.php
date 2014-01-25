<?php
/* @var $this TaxistaController */
/* @var $model Taxista */

$this->breadcrumbs=array(
	'Taxistas'=>array('index'),
	$model->id_taxista,
);

$this->menu=array(
	array('label'=>'List Taxista', 'url'=>array('index')),
	array('label'=>'Create Taxista', 'url'=>array('create')),
	array('label'=>'Update Taxista', 'url'=>array('update', 'id'=>$model->id_taxista)),
	array('label'=>'Delete Taxista', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_taxista),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Taxista', 'url'=>array('admin')),
);
?>

<h1>View Taxista #<?php echo $model->id_taxista; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_taxista',
		'fk_equipo',
		'direccion_taxista',
		'telefono_taxista',
		'company_taxista',
		'numero_taxista',
		'activo',
	),
)); ?>
