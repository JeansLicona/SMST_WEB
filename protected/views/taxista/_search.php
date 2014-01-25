<?php
/* @var $this TaxistaController */
/* @var $model Taxista */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_taxista'); ?>
		<?php echo $form->textField($model,'id_taxista'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fk_equipo'); ?>
		<?php echo $form->textField($model,'fk_equipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direccion_taxista'); ?>
		<?php echo $form->textField($model,'direccion_taxista',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono_taxista'); ?>
		<?php echo $form->textField($model,'telefono_taxista',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_taxista'); ?>
		<?php echo $form->textField($model,'company_taxista',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_taxista'); ?>
		<?php echo $form->textField($model,'numero_taxista',array('size'=>10,'maxlength'=>10)); ?>
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