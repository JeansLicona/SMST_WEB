<?php

/**
 * This is the model class for table "equipo".
 *
 * The followings are the available columns in table 'equipo':
 * @property integer $id_equipo
 * @property string $modelo_equipo
 * @property string $marca_equipo
 * @property string $fecha_compra
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property Taxista[] $taxistas
 */
class Equipo extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'equipo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('modelo_equipo, marca_equipo, fecha_compra, activo', 'required'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('modelo_equipo, marca_equipo', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_equipo, modelo_equipo, marca_equipo, fecha_compra, activo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'taxistas' => array(self::HAS_MANY, 'Taxista', 'fk_equipo'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_equipo' => 'Id Equipo',
            'modelo_equipo' => 'Modelo Equipo',
            'marca_equipo' => 'Marca Equipo',
            'fecha_compra' => 'Fecha Compra',
            'activo' => 'Activo',
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

        $criteria->compare('id_equipo', $this->id_equipo);
        $criteria->compare('modelo_equipo', $this->modelo_equipo, true);
        $criteria->compare('marca_equipo', $this->marca_equipo, true);
        $criteria->compare('fecha_compra', $this->fecha_compra, true);
        $criteria->compare('activo', $this->activo);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Equipo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        if ($this->fecha_compra == '') {
            $this->setAttribute('fecha_compra', null);
        } else {
            $this->fecha_compra = date('Y-m-d', strtotime($this->fecha_compra));
        }
        
        return parent::beforeSave();
    }

}
