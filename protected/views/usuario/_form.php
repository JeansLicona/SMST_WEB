<?php
    /* @var $this UsuarioController */
    /* @var $model Usuario */
    /* @var $form CActiveForm */
?>

<div class="form">

    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'usuario-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'nombre_usuario'); ?>
        <?php echo $form->textField($model, 'nombre_usuario', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'nombre_usuario'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'apellido_usuario'); ?>
        <?php echo $form->textField($model, 'apellido_usuario', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'apellido_usuario'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 15, 'maxlength' => 15)); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password_hash'); ?>
        <?php echo $form->passwordField($model, 'password_hash', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'password_hash'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tipo_usuario'); ?>
        <?php
            if (Yii::app()->user->id == 'administrador') {
                echo $form->dropDownList($model, 'tipo_usuario', array('operador' => 'Operador', 'taxista' => 'Taxista')
                        , array('empty' => 'Seleccione la Categoria'));
            } else {
                echo $form->dropDownList($model, 'tipo_usuario'
                        , array('taxista' => 'Taxista'));
            }
        ?>
        <?php echo $form->error($model, 'tipo_usuario'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'activo'); ?>
        <?php
            echo $form->dropDownList($model, 'activo', array('0' => 'Inactivo',
                '1' => 'Activo',), array('empty' => 'Seleccione la Categoria'));
        ?>
        <?php echo $form->error($model, 'activo'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Editar'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->