<?php
/* @var $this EquipoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Equipos',
);

$this->menu=array(
	array('label'=>'Registrar Equipo', 'url'=>array('create')),
	array('label'=>'Administrar Equipo', 'url'=>array('admin')),
);
?>

<h1>Equipos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
