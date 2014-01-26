<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Crear',
);

$this->pageTitle=Yii::app()->name.' - Registrar Usuario';

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Registrar Usuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>