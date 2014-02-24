<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */

$this->breadcrumbs=array(
	'Reporte Global'
);
?>
<h1>Reporte Global del Sistema</h1>

<div class="wide form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		// 'action'=>Yii::app()->createUrl($this->route),
		'action'=>Yii::app()->createUrl( 'solicitud/export'),
		'method'=>'post',
	)); ?>

	<div class="row">
		<label for="start_date">Fecha Inicial </label>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			    'name'=>'start_date',
			    // additional javascript options for the date picker plugin
			    'options'=>array(
			        'showAnim'=>'fold',
			        'dateFormat'=>'yy-mm-dd',
			    ),
			    'htmlOptions'=>array(
			        'style'=>'height:20px;'
			    ),
			));
		?>
	</div>

	<div class="row">
		<label for="end_date">Fecha Final </label>
		<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			    'name'=>'end_date',
			    // additional javascript options for the date picker plugin
			    'options'=>array(
			        'showAnim'=>'fold',
			        'dateFormat'=>'yy-mm-dd',
			    ),
			    'htmlOptions'=>array(
			        'style'=>'height:20px;'
			    ),
			));
		?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Exportar'); ?>
	</div>

	<?php $this->endWidget(); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'solicitud-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_solicitud',
		array(
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
