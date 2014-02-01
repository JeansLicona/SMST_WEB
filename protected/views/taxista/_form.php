<?php
/* @var $this TaxistaController */
/* @var $model Taxista */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'taxista-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'id_taxista'); ?>
        <?php echo $form->hiddenField($model, 'id_taxista', array('value' => $model->id_taxista)); ?>
        <?php echo $form->error($model, 'id_taxista'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fk_equipo'); ?>
        <?php
        echo $form->textField($model, 'fk_equipo', array('size' => 1, 'maxlength' => 10));
//        $equipos = CHtml::listData($equiposBusqueda, 'id_usuario', 'nombres');
//        echo $form->dropDownList($model, 'fk_equipo', $equipos, array('empty' => 'Seleccione Equipo'));
//        
        ?>
        <?php echo $form->error($model, 'fk_equipo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'direccion_taxista'); ?>
        <?php echo $form->textField($model, 'direccion_taxista', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'direccion_taxista'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'telefono_taxista'); ?>
        <?php echo $form->textField($model, 'telefono_taxista', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'telefono_taxista'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'company_taxista'); ?>
        <?php echo $form->textField($model, 'company_taxista', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'company_taxista'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'numero_taxista'); ?>
        <?php echo $form->textField($model, 'numero_taxista', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'numero_taxista'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'activo'); ?>
        <?php echo $form->hiddenField($model, 'activo', array('value' => $model->activo)); ?>
        <?php echo $form->error($model, 'activo'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Editar'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->