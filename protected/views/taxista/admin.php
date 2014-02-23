<?php
    /* @var $this TaxistaController */
    /* @var $model Taxista */

    $this->breadcrumbs = array(
        'Taxistas' => array('index'),
        'Administrar',
    );
    $this->pageTitle = Yii::app()->name . ' - Administrar Taxista';
    $this->menu = array(
        array('label' => 'Registrar Taxista', 'url' => array('usuario/create')),
        array('label' => 'Búsqueda Avanzada', 'url' => array('taxista/search')),
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
        'filter' => $model,
        'columns' => array(
            'id_taxista',
            'fk_equipo',
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
            ),
        ),
    ));
?>
