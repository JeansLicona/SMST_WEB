<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */

$this->breadcrumbs=array(
	'Reporte Global'
);
?>

<h1>Reporte Global del Sistema</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'solicitud-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_solicitud',
		array(
			'name'=>'fk_taxista',
			'value'=>'$data->taxista->idTaxista->nombre_usuario',
			'header'=>'Taxista',
		),
		array(
			'value'=>'$data->cliente->nombre_usuario',
			'header'=>'Cliente'
		),
		'latitud_solicitud',
		'longitud_solicitud',
		array(
			'name'=>'estado_solicitud',
			'value'=>'Solicitud::getEstadoName($data->estado_solicitud)',
			'filter'=> CHtml::dropDownList('Solicitud[estado_solicitud]', $model->estado_solicitud, Solicitud::getEstadosList(), array('empty'=>'')),
		),
		'hora_fecha_solicitud',
		array(
			'name'=>'costo_solcitud',
			'value'=>'"$" . $data->costo_solcitud'
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}'
		),
	),
)); ?>
