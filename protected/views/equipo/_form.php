<?php
/* @var $this EquipoController */
/* @var $model Equipo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'equipo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'modelo_equipo'); ?>
		<?php echo $form->textField($model,'modelo_equipo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'modelo_equipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marca_equipo'); ?>
		<?php echo $form->textField($model,'marca_equipo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'marca_equipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_compra'); ?>
                <?php                    
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'model'=>$model,
                        'attribute'=>'fecha_compra',
                        'value'=>$model->fecha_compra,
                        'options'=>array(
                            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                         ),
                        'htmlOptions'=>array(
                            'style'=>'height:20px;color:black;',
                        ),
                    ));                           
                ?> 
		<?php echo $form->error($model,'fecha_compra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
                <?php $options = array ('1' => 'Activo', '0' => 'Inactivo'); ?>
                <?php echo $form->dropDownList($model, 'activo', $options); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Editar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->