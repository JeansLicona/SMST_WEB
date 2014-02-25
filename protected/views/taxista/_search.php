<?php
    /* @var $this TaxistaController */
    /* @var $model Taxista */
    /* @var $form CActiveForm */

    $this->breadcrumbs = array(
        'Taxistas' => array('index'),
        'Búsqueda Avanzada',
    );
    $this->pageTitle = Yii::app()->name . ' - Búsqueda de Taxista';

    $this->menu = array(
        array('label' => 'Registrar Taxista', 'url' => array('usuario/create')),
        array('label' => 'Administrar Taxistas', 'url' => array('taxista/admin')),
    );

    Yii::app()->clientScript->registerScript('search', "$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;});
        $('.search-form form').submit(function(){
	$('#taxista-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;});");

    $equiposBusqueda = Equipo::model()->findAll();
?>

<h1>B&uacute;squeda avanzada de Taxistas</h1>
<div class="search-form" style="">
    <div class="wide form">

        <?php
            $form = $this->beginWidget('CActiveForm', array(
                'action' => Yii::app()->createUrl($this->route),
                'method' => 'get',
            ));
        ?>

        <div class="row">
            <?php echo $form->label($model, 'fk_equipo'); ?>
            <?php
                $equipos = CHtml::listData($equiposBusqueda, 'id_equipo', 'modelo_equipo');
                echo $form->dropDownList($model, 'fk_equipo', $equipos, array('empty' => 'Seleccione Equipo'));
            ?>
        </div>

        <div class="row">
            <?php echo $form->label($model, 'direccion_taxista'); ?>
            <?php echo $form->textField($model, 'direccion_taxista', array('size' => 60, 'maxlength' => 100)); ?>
        </div>

        <div class="row">
            <?php echo $form->label($model, 'telefono_taxista'); ?>
            <?php echo $form->textField($model, 'telefono_taxista', array('size' => 10, 'maxlength' => 10)); ?>
        </div>

        <div class="row">
            <?php echo $form->label($model, 'company_taxista'); ?>
            <?php echo $form->textField($model, 'company_taxista', array('size' => 60, 'maxlength' => 100)); ?>
        </div>

        <div class="row">
            <?php echo $form->label($model, 'numero_taxista'); ?>
            <?php echo $form->textField($model, 'numero_taxista', array('size' => 10, 'maxlength' => 10)); ?>
        </div>

        <div class="row">
            <?php echo $form->label($model, 'email_taxista'); ?>
            <?php echo $form->textField($model, 'email_taxista', array('size' => 35, 'maxlength' => 35)); ?>
        </div>
        
        <div class="row buttons">
            <?php echo CHtml::submitButton('Buscar'); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- search-form -->
</div>

<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'taxista-grid',
        'dataProvider' => $model->searchAdvance(),
        'columns' => array(
            'fkEquipo.modelo_equipo',
            'direccion_taxista',
            'telefono_taxista',
            'company_taxista',
            'numero_taxista',
            'email_taxista',
            /*
              'activo',
             */
            array(
                'class' => 'CButtonColumn',
                'class' => 'CButtonColumn',
                'template'=>'{cuenta}{view}{update}{delete}', //Botón personalizado pára mostrar
                 'buttons'=>array(
                 	'cuenta' => array(
                 		//'label'=>'Estado de cuenta',
                 		'imageUrl'=>Yii::app()->request->baseUrl.'/images/cuentaf.png',
                 		//'url'=>'Yii::app()->createUrl("/taxista/reporte?id=$data->id" )',
                 		'url'=>'Yii::app()->createUrl("/taxista/reporte", array("id"=>$data->id_taxista))',
                 		'visible'=>'$data->activo',
                 		//'visible'=>'$data->actionReporte()',
                 		'click' => 'function(data)',
                 		),
                 	),
            ),
        ),
    ));
?>