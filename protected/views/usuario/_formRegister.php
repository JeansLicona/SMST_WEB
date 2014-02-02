<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<?php //var_dump($model); ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>false,
	'clientOptions' =>array(
			'validateOnSubmit' => true,
			'validateOnChange' => true,
			'validateOnType' => true,
		),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'_contrasena2'); ?>
		<?php echo $form->passwordField($model,'_contrasena2',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'_contrasena2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'_confirmarContrasena'); ?>
		<?php echo $form->passwordField($model,'_confirmarContrasena',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'_confirmarContrasena'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correo'); ?>
		<?php echo $form->textField($model,'correo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'correo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model, 'verifyCode'); ?>
	<div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->