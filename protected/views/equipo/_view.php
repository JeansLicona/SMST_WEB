<?php
/* @var $this EquipoController */
/* @var $data Equipo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_equipo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_equipo), array('view', 'id'=>$data->id_equipo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelo_equipo')); ?>:</b>
	<?php echo CHtml::encode($data->modelo_equipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marca_equipo')); ?>:</b>
	<?php echo CHtml::encode($data->marca_equipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_compra')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_compra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php 
        if($data->activo==1){
            echo "Activo";
        }else{
            echo "Inactivo";
        }
        ?>
	<br />
	<br />


</div>