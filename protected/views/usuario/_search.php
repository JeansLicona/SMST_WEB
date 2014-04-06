<?php
    /* @var $this UsuarioController */
    /* @var $model Usuario */
    /* @var $form CActiveForm */

    $this->breadcrumbs = array(
        'Taxistas' => array('index'),
        'Búsqueda Avanzada',
    );
    $this->pageTitle = Yii::app()->name . ' - Búsqueda de Taxista';

    if (Yii::app()->user->id == 'administrador') {
        $this->menu = array(
            array(
                'label' => 'Usuario',
                'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                'itemOptions ' => array('class' => 'dropdown'),
                'submenuOptions ' => array('class' => 'dropdown-menu'),
                'items' => array(
                    array('label' => 'Registrar Usuario', 'url' => array('usuario/create')),
                    array('label' => 'Administrar Usuario', 'url' => array('admin')),
                    array('label' => 'Búsqueda Avanzada Taxistas', 'url' => array('usuario/search')),
                    array('label' => 'Administrar Taxistas', 'url' => array('taxista/admin')),
                )
            ),
            array(
                'label' => 'Equipo',
                'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                'itemOptions ' => array('class' => 'dropdown'),
                'submenuOptions ' => array('class' => 'dropdown-menu'),
                'items' => array(
                    array('label' => 'Registrar Equipo', 'url' => array('equipo/create')),
                    array('label' => 'Administrar Equipo', 'url' => array('equipo/admin')),
                )
            ),
            array(
                'label' => 'Reporte',
                'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                'itemOptions ' => array('class' => 'dropdown'),
                'submenuOptions ' => array('class' => 'dropdown-menu'),
                'items' => array(
                    array('label' => ' Reporte Global Sistema', 'url' => array('solicitud/admin')),
                )
            ),
        );
    } else {
        $this->menu = array(
            array(
                'label' => 'Taxista',
                'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                'itemOptions ' => array('class' => 'dropdown'),
                'submenuOptions ' => array('class' => 'dropdown-menu'),
                'items' => array(
                    array('label' => 'Registrar Taxista', 'url' => array('usuario/create')),
                    array('label' => 'Búsqueda Avanzada Taxista', 'url' => array('usuario/search')),
                    array('label' => 'Administrar Taxistas', 'url' => array('taxista/admin')),
                )
            ),
            array(
                'label' => 'Equipo',
                'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                'itemOptions ' => array('class' => 'dropdown'),
                'submenuOptions ' => array('class' => 'dropdown-menu'),
                'items' => array(
                    array('label' => 'Registrar Equipo', 'url' => array('equipo/create')),
                    array('label' => 'Administrar Equipo', 'url' => array('equipo/admin')),
                )
            ),
            array(
                'label' => 'Reporte',
                'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                'itemOptions ' => array('class' => 'dropdown'),
                'submenuOptions ' => array('class' => 'dropdown-menu'),
                'items' => array(
                    array('label' => ' Reporte Global Sistema', 'url' => array('solicitud/admin')),
                )
            ),
        );
    }
    Yii::app()->clientScript->registerScript('search', "$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;});
        $('.search-form form').submit(function(){
	$('#taxista-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;});");
?>

<h1>B&uacute;squeda avanzada de Taxistas</h1>

<div class="wide form">

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
?>

    <div class="row">
<?php echo $form->label($model, 'id_usuario'); ?>
        <?php echo $form->textField($model, 'id_usuario'); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'nombre_usuario'); ?>
        <?php echo $form->textField($model, 'nombre_usuario', array('size' => 30, 'maxlength' => 30)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'apellido_usuario'); ?>
        <?php echo $form->textField($model, 'apellido_usuario', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 15, 'maxlength' => 15)); ?>
    </div>

    <div class="row">
<?php echo $form->hiddenField($model, 'tipo_usuario', array('value' => "taxista")); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'activo'); ?>
        <?php echo $form->dropDownList($model, 'activo', array('0' => 'Inactivo',
                '1' => 'Activo',), array('empty' => 'Seleccione la Categoria'));
        ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Buscar'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->


<h1>Taxistas Activos</h1>
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'usuario-grid',
        'dataProvider' => $model->searchTaxistaActivo(),
        'columns' => array(
            'id_usuario',
            'nombre_usuario',
            'apellido_usuario',
            'username',
            'tipo_usuario',
            array(
                'class' => 'CButtonColumn',
                'template' => '{view}{update}{cuenta}{desactivar}', //Botón personalizado pára mostrar
                'buttons' => array(
                    'cuenta' => array(
                        //'label'=>'Estado de cuenta',
                        'imageUrl' => Yii::app()->request->baseUrl . '/images/cuentafac.png',
                        'url' => 'Yii::app()->createUrl("/taxista/reporte", array("id"=>$data->id_usuario))',
                        'visible' => '$data->activo',
                        'click' => 'function(data)',
                    ),
                    'desactivar' => array(
                        'imageUrl' => Yii::app()->request->baseUrl . '/images/desactivar.png',
                        'url' => 'Yii::app()->createUrl("/taxista/suscripcion", array("id"=>$data->id_usuario))',
                        'visible' => '$data->activo',
                        'click' => 'function(data)',
                    ),
                ),
            ),
        ),
    ));
    ?>
<h1>Taxistas Inactivos</h1>
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'usuario-grid',
        'dataProvider' => $model->searchTaxistaInactivo(),
        'columns' => array(
            'id_usuario',
            'nombre_usuario',
            'apellido_usuario',
            'username',
            'tipo_usuario',
            array(
                'class' => 'CButtonColumn',
                'template' => ' {view}{update}{cuenta}{activar}', //Botón personalizado pára mostrar
                'buttons' => array(
                    'cuenta' => array(
                        //'label'=>'Estado de cuenta',
                        'imageUrl' => Yii::app()->request->baseUrl . '/images/cuentafac.png',
                        //'url'=>'Yii::app()->createUrl("/taxista/reporte?id=$data->id" )',
                        'url' => 'Yii::app()->createUrl("/taxista/reporte", array("id"=>$data->id_usuario))',
                    ),
                    'activar' => array(
                        'imageUrl' => Yii::app()->request->baseUrl . '/images/activar.png',
                        'url' => 'Yii::app()->createUrl("/taxista/suscripcion", array("id"=>$data->id_usuario))',
                    ),
                ),
            ),
        ),
    ));
?>