<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id_usuario,
);

$this->pageTitle=Yii::app()->name.' - Ver Usuario';

$this->menu=array(
	array('label'=>'Listar Usuario', 'url'=>array('index')),
	array('label'=>'Registrar Usuario', 'url'=>array('create')),
	array('label'=>'Editar Usuario', 'url'=>array('update', 'id'=>$model->id_usuario)),
	array('label'=>'Eliminar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Usuario', 'url'=>array('admin')),
);
?>

<h1>Usuario <?php echo $model->nombre_usuario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_usuario',
		'nombre_usuario',
		'apellido_usuario',
		'username',
		
		'tipo_usuario',
		'activo',
	),
)); ?>
