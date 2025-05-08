<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Detalleventa]].
 *
 * @see Detalleventa
 */
class DetalleventaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Detalleventa[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Detalleventa|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
