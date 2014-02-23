<?php
/* @var $this TaxistaController */
/* @var $model Taxista */

$this->breadcrumbs=array(
	'Taxistas'=>array('index'),
	$model->id_taxista,
);

$this->pageTitle=Yii::app()->name.' - Ver Taxista';

$this->menu=array(
	array('label'=>'Registar Taxista', 'url'=>array('usuario/create')),
	array('label'=>'Editar Taxista', 'url'=>array('update', 'id'=>$model->id_taxista)),
	array('label'=>'Eliminar Taxista', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_taxista),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Taxistas', 'url'=>array('admin')),
);
$usuario=Usuario::model()->findByPk($model->id_taxista);
?>

<h1> Taxista <?php echo $usuario->nombre_usuario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'fkEquipo.modelo_equipo',
		'direccion_taxista',
		'telefono_taxista',
		'company_taxista',
		'numero_taxista',
                'emal_taxista',
	),
)); ?>
