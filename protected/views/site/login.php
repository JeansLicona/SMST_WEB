<?php
    /* @var $this SiteController */
    /* @var $model LoginForm */
    /* @var $form CActiveForm  */

    $this->pageTitle = Yii::app()->name . ' - Iniciar sesion';
    $this->breadcrumbs = array(
        'Iniciar sesion',
    );
?>

<div class="clearfix">
    <div class="pull-left" id='imagen'>
        <?php
            echo CHtml::image(Yii::app()->baseUrl . '/images/logo.jpg', '', array('width' => 300, 'height' => 300));
        ?>
    </div>
    <div class="pull-right" id="login">
        <div class="pull-left">
            <h1>Iniciar sesion</h1>
            <div class="form">
                <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'login-form',
                        'enableClientValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                    ));
                ?>

                <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

                <?php
                    $msgs = Yii::app()->user->getFlashes();
                    if ($msgs !== null) {
                        foreach ($msgs as $tipo => $mensaje) {
                            ?>
                            <div class="alert-<?php echo $tipo; ?>">
                                <?php echo $mensaje; ?>
                            </div>
                            <?php
                        }
                    }
                ?>
                <div class="row">
                    <?php echo $form->labelEx($model, 'username'); ?>
                    <?php echo $form->textField($model, 'username'); ?>
                    <?php echo $form->error($model, 'username'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'password'); ?>
                    <?php echo $form->passwordField($model, 'password'); ?>
                    <?php echo $form->error($model, 'password'); ?>
                </div>

                <div class="row rememberMe">
                    <?php echo $form->checkBox($model, 'rememberMe'); ?>
                    <?php echo $form->label($model, 'rememberMe'); ?>
                    <?php echo $form->error($model, 'rememberMe'); ?>
                </div>

                <div class="row buttons">
                    <?php echo CHtml::submitButton('Login'); ?>
                </div>



                <?php $this->endWidget(); ?>
            </div><!-- form -->
            <div></div>
        </div>
    </div>
</div>
