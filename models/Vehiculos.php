<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehiculos".
 *
 * @property int $idvehiculos
 * @property string|null $marca
 * @property string|null $modelo
 * @property string|null $anio
 * @property float|null $precio
 * @property string|null $disponible
 *
 * @property Ventas[] $ventas
 */
class Vehiculos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehiculos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marca', 'modelo', 'anio', 'precio', 'disponible'], 'default', 'value' => null],
            [['anio'], 'safe'],
            [['precio'], 'number'],
            [['marca', 'modelo', 'disponible'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idvehiculos' => Yii::t('app', 'Idvehiculos'),
            'marca' => Yii::t('app', 'Marca'),
            'modelo' => Yii::t('app', 'Modelo'),
            'anio' => Yii::t('app', 'Año'),
            'precio' => Yii::t('app', 'Precio'),
            'disponible' => Yii::t('app', 'Disponible'),
        ];
    }

    /**
     * Gets query for [[Ventas]].
     *
     * @return \yii\db\ActiveQuery|VentasQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::class, ['vehiculos_idvehiculos' => 'idvehiculos']);
    }

    /**
     * {@inheritdoc}
     * @return VehiculosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VehiculosQuery(get_called_class());
    }

}
