<?php
/* @var $this EquipoController */
/* @var $model Equipo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_equipo'); ?>
		<?php echo $form->textField($model,'id_equipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modelo_equipo'); ?>
		<?php echo $form->textField($model,'modelo_equipo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marca_equipo'); ?>
		<?php echo $form->textField($model,'marca_equipo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_compra'); ?>
		<?php echo $form->textField($model,'fecha_compra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->