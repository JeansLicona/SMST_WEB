<?php
/* @var $this TaxistaController */
/* @var $data Taxista */
$usuario=Usuario::model()->findByPk($data->id_taxista);
$equipo=  Equipo::model()->findByPk($data->fk_equipo);
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Taxista')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($usuario->nombre_usuario), array('view', 'id'=>$data->id_taxista)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fk_equipo')); ?>:</b>
	<?php echo CHtml::encode($equipo->modelo_equipo); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php 
        if($data->activo==1){
            echo "Activo";
        }else{
            echo "Inactivo";
        }
        ?>
        <br/>
	<br />


</div>