<?php
    $taxista= Usuario::model()->findByPk($_GET['id']);
    $this->breadcrumbs = array(
        'Taxistas' => array('index'),
        'Reporte de estado de cuenta',
    );
    $this->pageTitle = Yii::app()->name . ' - Estado Cuenta Taxista';
    $this->menu = array(
        array('label' => 'Registrar Taxista', 'url' => array('usuario/create')),
        array('label' => 'Administrar Taxista', 'url' => array('usuario/admin')),
        array('label' => 'Búsqueda Avanzada', 'url' => array('taxista/search')),
    );
?>

<div class="form">
    <div class="row">
        <h1>Reporte estado de cuenta de: <?php echo $taxista->nombre_usuario; ?></h1>
        <label style="margin-left: 5px">Seleccionar el periodo de tiempo:</label>
        <?php
            echo CHtml::beginForm(array('taxista/reporte&id='.$_GET['id']), 'post');
        ?>
        <label style="margin-left: -15px">Fecha de Inicio:</label>
        <?php
            CHtml::textField('fecha_inicio_reporte', '', array('id' => 'idTextField',
                'width' => 10,
                'maxlength' => 10));
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'fecha_inicio_reporte',
                'language' => 'es',
                'options' => array(
                    'showAnim' => 'fold',
                    'dateFormat' => 'yy-mm-dd',
                    'changeYear' => true,
                    'changeMonth' => true,
                    'yearRange' => '1900',
                    'value' => date('Y-m-d'),
                ),
            ));
        ?>
        <label style="margin-left: -50px">Fecha de Fin:</label>
        <?php
            CHtml::textField('fecha_fin_reporte');
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'fecha_fin_reporte',
                'language' => 'es',
                'options' => array(
                    'showAnim' => 'fold',
                    'dateFormat' => 'yy-mm-dd',
                    'changeYear' => true,
                    'changeMonth' => true,
                    'yearRange' => '1900',
                    'value' => date('Y-m-d'),
                ),
            ));

            echo CHtml::submitButton('Generar estado de cuenta', array('style' => 'margin-left: 10px', 'name' => 'reporte'));
        ?>
        <?php echo CHtml::endForm(); ?>
    </div>
    <div class="row">
        <?php
            if (!empty($reporte)) {
                echo $reporte;
            }
        ?>
    </div>
</div>