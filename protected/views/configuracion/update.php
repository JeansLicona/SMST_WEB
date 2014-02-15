<?php
/* @var $this ConfiguracionController */
/* @var $model Configuracion */

$this->breadcrumbs=array(
	'Configuracions'=>array('index'),
	$model->id_conf=>array('view','id'=>$model->id_conf),
	'Update',
);

$this->menu=array(
	array('label'=>'Ver Configuraciones', 'url'=>array('view', 'id'=>$model->id_conf)),
);
?>

<h1>Update Configuracion <?php echo $model->id_conf; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>