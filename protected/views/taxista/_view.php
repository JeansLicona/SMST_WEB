<?php
/* @var $this TaxistaController */
/* @var $data Taxista */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_taxista')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_taxista), array('view', 'id'=>$data->id_taxista)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_equipo')); ?>:</b>
	<?php echo CHtml::encode($data->fk_equipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_taxista')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_taxista); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_taxista')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_taxista); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_taxista')); ?>:</b>
	<?php echo CHtml::encode($data->company_taxista); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_taxista')); ?>:</b>
	<?php echo CHtml::encode($data->numero_taxista); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />


</div>