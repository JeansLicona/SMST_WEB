<?php

/**
 * This is the model class for table "configuracion".
 *
 * The followings are the available columns in table 'configuracion':
 * @property double $costo_solicitud
 * @property integer $frecuencia_balance_taxista
 */
class Configuracion extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'configuracion';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('costo_solicitud, frecuencia_balance_taxista', 'required'),
            array(
                'frecuencia_balance_taxista',
                'numerical',
                'integerOnly'=>true
            ),
            array('costo_solicitud', 'numerical'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'costo_solicitud, frecuencia_balance_taxista',
                'safe',
                'on'=>'search'
                ),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'costo_solicitud' => 'Costo Solicitud',
            'frecuencia_balance_taxista' =>
                'Frecuencia de Envío del Estado de Cuenta del Taxista',
        );
    }

    /**
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {


        $criteria=new CDbCriteria;

        $criteria->compare('costo_solicitud',$this->costo_solicitud);
        $criteria->compare('frecuencia_balance_taxista',
            $this->frecuencia_balance_taxista);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * @param string $className active record class name.
     * @return Configuracion the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
