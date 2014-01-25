<?php
/* @var $this TaxistaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Taxistas',
);

$this->menu=array(
	array('label'=>'Create Taxista', 'url'=>array('create')),
	array('label'=>'Manage Taxista', 'url'=>array('admin')),
);
?>

<h1>Taxistas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
