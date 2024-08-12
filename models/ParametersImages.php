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
    const TYPE_ICON = 1;
    const TYPE_ICON_GRAY = 2;

    public static array $types = [
        self::TYPE_ICON      => 'icon',
        self::TYPE_ICON_GRAY => 'icon_gray',
    ];

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

    public static function normalizeName(string $name): string
    {
        $name = mb_strtolower($name, 'UTF-8');
        $name = str_replace(
            [
                'а',
                'б',
                'в',
                'г',
                'д',
                'е',
                'ё',
                'ж',
                'з',
                'и',
                'й',
                'к',
                'л',
                'м',
                'н',
                'о',
                'п',
                'р',
                'с',
                'т',
                'у',
                'ф',
                'х',
                'ц',
                'ч',
                'ш',
                'щ',
                'ъ',
                'ы',
                'ь',
                'э',
                'ю',
                'я'
            ],
            [
                'a',
                'b',
                'v',
                'g',
                'd',
                'e',
                'e',
                'zh',
                'z',
                'i',
                'y',
                'k',
                'l',
                'm',
                'n',
                'o',
                'p',
                'r',
                's',
                't',
                'u',
                'f',
                'kh',
                'ts',
                'ch',
                'sh',
                'sch',
                '',
                'y',
                '',
                'e',
                'yu',
                'ya'
            ],
            $name
        );

        return preg_replace('/[^a-zA-Z_\-]/', '', $name);
    }
}
