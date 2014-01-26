<?php
/* @var $this TaxistaController */
/* @var $model Taxista */

$this->breadcrumbs=array(
	'Taxistas'=>array('index'),
	$model->id_taxista=>array('view','id'=>$model->id_taxista),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar Taxistas', 'url'=>array('index')),
	array('label'=>'Registrar Taxista', 'url'=>array('usuario/create')), //cambiar a que dirija a create usuario
	array('label'=>'Ver Taxista', 'url'=>array('view', 'id'=>$model->id_taxista)),
	array('label'=>'Administrar Taxistas', 'url'=>array('admin')),
);
?>

<h1>Edici&oacute;n Taxista <?php echo $model->id_taxista; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>