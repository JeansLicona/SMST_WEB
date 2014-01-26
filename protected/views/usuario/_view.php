<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

<!--	<b><?php // echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php // echo CHtml::link(CHtml::encode($data->id_usuario), array('view', 'id'=>$data->id_usuario)); ?>
	<br />-->

        <b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->id_usuario));
         ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_usuario);?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_usuario); ?>
	<br />

<!--	<b><?php // echo CHtml::encode($data->getAttributeLabel('password_hash')); ?>:</b>
	<?php // echo CHtml::encode($data->password_hash); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php 
        if($data->activo==1){
            echo "Si";
        }else{
            echo "No";
        }
        ?>
	<br />


</div>