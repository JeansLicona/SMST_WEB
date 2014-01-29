<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id_usuario
 * @property string $nombre_usuario
 * @property string $apellido_usuario
 * @property string $username
 * @property string $password_hash
 * @property string $tipo_usuario
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property RegistroConfiguracion[] $registroConfiguracions
 * @property Solicitud[] $solicituds
 * @property Taxista $taxista
 */
class Usuario extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
//    public $confirmarContrasena;

    public function tableName() {
        return 'usuario';
    }

//    public function beforeSave() {
//        if (parent::beforeSave() && $this->confirmarContrasena == $this->password_hash) {
//            $this->password_hash = crypt($this->password_hash);
//            return true;
//        }
//        return false;        
//    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre_usuario, apellido_usuario, username, password_hash, tipo_usuario, activo', 'required'),
            array('username', 'unique'),
            array('activo', 'numerical', 'integerOnly' => true),
            array('nombre_usuario', 'length', 'max' => 30),
            array('password_hash', 'length', 'max' => 100, 'min' => 8),
            array('apellido_usuario', 'length', 'max' => 50),
            array('username', 'length', 'max' => 15),
            array('tipo_usuario', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_usuario, nombre_usuario, apellido_usuario, username, password_hash, tipo_usuario, activo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'registroConfiguracions' => array(self::HAS_MANY, 'RegistroConfiguracion', 'fk_usuario'),
            'solicituds' => array(self::HAS_MANY, 'Solicitud', 'fk_usuario'),
            'taxista' => array(self::HAS_ONE, 'Taxista', 'id_taxista'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_usuario' => 'ID Usuario',
            'nombre_usuario' => 'Nombres',
            'apellido_usuario' => 'Apellidos',
            'username' => 'Nombre de Usuario',
            'password_hash' => 'Contraseña',
            'tipo_usuario' => 'Tipo Usuario',
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

        $criteria->compare('id_usuario', $this->id_usuario);
        $criteria->compare('nombre_usuario', $this->nombre_usuario, true);
        $criteria->compare('apellido_usuario', $this->apellido_usuario, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password_hash', $this->password_hash, true);
        $criteria->compare('tipo_usuario', $this->tipo_usuario, true);
        $criteria->compare('activo', 1);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Usuario the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
