<?php
/* @var $this ConfiguracionController */
/* @var $model Configuracion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'configuracion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'costo_solicitud'); ?>
		<?php echo $form->textField($model,'costo_solicitud'); ?>
		<?php echo $form->error($model,'costo_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frecuencia_balance_taxista'); ?>
		<?php echo $form->textField($model,'frecuencia_balance_taxista'); ?>
		<?php echo $form->error($model,'frecuencia_balance_taxista'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->