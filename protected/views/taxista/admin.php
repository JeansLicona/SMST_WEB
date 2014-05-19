<?php
    /* @var $this TaxistaController */
    /* @var $model Taxista */

    $this->breadcrumbs = array(
        'Taxistas' => array('index'),
        'Administrar',
    );
    $this->pageTitle = Yii::app()->name . ' - Administrar Taxista';
    $this->menu = array(
        array(
        'label' => 'Taxista',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>'Registrar Taxista', 'url'=>array('usuario/create')),
	array('label'=>'Búsqueda Avanzada Taxista', 'url'=>array('usuario/search')),
    array('label'=>'Localizar Taxistas', 'url'=>array('taxista/locate')),
            )
        ),
        array(
        'label' => 'Equipo',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>'Registrar Equipo', 'url'=>array('equipo/create')),
	array('label'=>'Administrar Equipo', 'url'=>array('equipo/admin')),

            )
        ),
        array(
        'label' => 'Reporte',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>' Reporte Global Sistema', 'url'=>array('solicitud/admin')),
            )
        ),
        array(
        'label' => 'Configuraciones',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
            array( 'label'=>'Ver configuraciones', 'url'=>array('/configuracion/1') ),
            array( 'label'=>'Actualizar configuraciones', 'url'=>array('/configuracion/update/1') )
        ) ),
    );

    Yii::app()->clientScript->registerScript('search', "$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;});
        $('.search-form form').submit(function(){
	$('#taxista-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;});");
?>

<h1>Administrar Taxistas</h1>

<p>
    También puede escribir un operador de comparación(<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    o <b>=</b>) al comienzo de cada uno de sus valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'taxista-grid',
        'dataProvider' => $model->search(),
        'columns' => array(
            'idTaxista.nombre_usuario',
            'idTaxista.apellido_usuario',
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
                'template' => '{view}{update}',
            ),
        ),
    ));
?>
