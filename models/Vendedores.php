<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendedores".
 *
 * @property int $idvendedores
 * @property string|null $nombre
 * @property string|null $correo
 * @property string|null $telefono
 *
 * @property Detalleventa[] $detalleventas
 */
class Vendedores extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendedores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'correo', 'telefono'], 'default', 'value' => null],
            [['nombre', 'correo'], 'string', 'max' => 100],
            [['telefono'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idvendedores' => Yii::t('app', 'Idvendedores'),
            'nombre' => Yii::t('app', 'Nombre'),
            'correo' => Yii::t('app', 'Correo'),
            'telefono' => Yii::t('app', 'Telefono'),
        ];
    }

    /**
     * Gets query for [[Detalleventas]].
     *
     * @return \yii\db\ActiveQuery|DetalleventaQuery
     */
    public function getDetalleventas()
    {
        return $this->hasMany(Detalleventa::class, ['vendedores_idvendedores' => 'idvendedores']);
    }

    /**
     * {@inheritdoc}
     * @return VendedoresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VendedoresQuery(get_called_class());
    }

}
