<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "parameters_images".
 *
 * @property int $id
 * @property string $path
 * @property string $primary_name
 * @property int $icon_type
 * @property int $parameter_id
 */
class ParametersImages extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parameters_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path', 'primary_name', 'icon_type', 'parameter_id'], 'required'],
            [['icon_type', 'parameter_id'], 'integer'],
            [['path', 'primary_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'           => 'ID',
            'path'         => 'Path',
            'primary_name' => 'Primary Name',
            'icon_type'    => 'Icon Type',
            'parameter_id' => 'Parameter ID',
        ];
    }
}
