<?php

/**
 * This is the model class for table "taxista".
 *
 * The followings are the available columns in table 'taxista':
 * @property integer $id_taxista
 * @property integer $fk_equipo
 * @property string $direccion_taxista
 * @property string $telefono_taxista
 * @property string $company_taxista
 * @property string $numero_taxista
 * @property string $email_taxista
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property Solicitud[] $solicituds
 * @property Usuario $idTaxista
 * @property Equipo $fkEquipo
 */
class Taxista extends CActiveRecord {

    public $fecha_inicio_reporte;
    public $fecha_fin_reporte;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'taxista';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('direccion_taxista, telefono_taxista, company_taxista, numero_taxista, email_taxista','required'),
            array('fk_equipo, activo', 'numerical', 'integerOnly' => true),
            array('direccion_taxista, company_taxista', 'length', 'max' => 100),
            array('telefono_taxista, numero_taxista', 'length', 'max' => 10),
            array('email_taxista', 'length', 'max' => 35),
            array('email_taxista','email','message'=>"El correo electrónico incorrecto"),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_taxista, fk_equipo, direccion_taxista, telefono_taxista, company_taxista, numero_taxista, email_taxista, activo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'solicituds' => array(self::HAS_MANY, 'Solicitud', 'fk_taxista'),
            'idTaxista' => array(self::BELONGS_TO, 'Usuario', 'id_taxista'),
            'fkEquipo' => array(self::BELONGS_TO, 'Equipo', 'fk_equipo'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_taxista' => '',
            'fk_equipo' => 'Equipo',
            'direccion_taxista' => 'Dirección Taxista',
            'telefono_taxista' => 'Teléfono del Taxista',
            'company_taxista' => 'Compañía del Taxista',
            'numero_taxista' => 'Número del Taxista',
            'email_taxista' => 'Email',
            'activo' => '',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_taxista', $this->id_taxista);
        $criteria->compare('fk_equipo', $this->fk_equipo);
        $criteria->compare('direccion_taxista', $this->direccion_taxista, true);
        $criteria->compare('telefono_taxista', $this->telefono_taxista, true);
        $criteria->compare('company_taxista', $this->company_taxista, true);
        $criteria->compare('numero_taxista', $this->numero_taxista, true);
        $criteria->compare('email_taxista', $this->email_taxista, true);
        $criteria->compare('activo', $this->activo);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchAdvance() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_taxista', $this->id_taxista);
        $criteria->compare('fk_equipo', $this->fk_equipo);
        $criteria->compare('direccion_taxista', $this->direccion_taxista, true);
        $criteria->compare('telefono_taxista', $this->telefono_taxista, true);
        $criteria->compare('company_taxista', $this->company_taxista, true);
        $criteria->compare('numero_taxista', $this->numero_taxista, true);
        $criteria->compare('email_taxista', $this->email_taxista, true);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Taxista the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }


    /**
    * Selecciona los campos id_equipo y modelo_equipo de todos los equipos 
    * que no estén relacionados con algún taxista en las tablas
    * equipo y taxista, tomando en cuenta para la selección los campos id_equipo y fk_equipo,
    * de las tablas mencionadas anteriormente.
    */
    public function getUnsetEquipos()
    {
        /*Query que selecciona todos los equipos registrados en la tabla equipo de la base
        de datos y que no están relacionados con algún elemento de la tabla taxista tomando
        como referencia los campos id_equipo y fk_equipo respectivamente. Más especificamente
        solo se selecciona la información de los siguientes campos de la tabla equipo: 
        id_equipo y modelo_equipo.*/

        $query = "SELECT id_equipo, modelo_equipo FROM equipo WHERE NOT EXISTS ( SELECT 1 FROM taxista 
                    WHERE taxista.fk_equipo = equipo.id_equipo )";
        //Se ejecuta el query y se toman todos los registros que cumplieron la norma
        return Yii::app()->db->createCommand($query)->queryAll(); 
    }
    
}
