<?php

namespace app\models;

use app\helpers\DumpHelper;
use yii\base\Exception;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "parameters".
 *
 * @property int $id
 * @property string $title
 * @property int $type
 */
class Parameters extends ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $icon;
    /**
     * @var UploadedFile
     */
    public $iconGray;

    const TYPE_ONE = 1;
    const TYPE_TWO = 2;

    public static array $typesList = [
        self::TYPE_ONE => 'Тип без иконок (1)',
        self::TYPE_TWO => 'Тип с иконками (2)',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'parameters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [
                ['title', 'type'],
                'required'
            ],
            [
                ['type'],
                'integer'
            ],
            [
                ['title'],
                'string',
                'max' => 64
            ],
            [
                ['icon'],
                'file',
                'skipOnEmpty' => true,
                'mimeTypes'   => 'image/*',
                'maxSize'     => 2 * 1024 * 1024
            ],
            [
                ['iconGray'],
                'file',
                'skipOnEmpty' => true,
                'mimeTypes'   => 'image/*',
                'maxSize'     => 2 * 1024 * 1024
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id'    => 'ID',
            'title' => 'Title',
            'type'  => 'Type',
        ];
    }

    /**
     * @throws Exception
     */
    public function saveImage(): bool
    {
        $path = 'uploads/icons';
        FileHelper::createDirectory($path);

        if ($this->validate()) {
            if ($this->icon) {
                $this->icon->saveAs("{$path}/{$this->icon->baseName}.{$this->icon->extension}");
            }
            /*@TODO добавить преобразование исходного имени, добавить сохранение информации в сводную таблицу*/
            if ($this->iconGray) {
                $this->iconGray->saveAs("{$path}/{$this->iconGray->baseName}.{$this->iconGray->extension}");
            }

            return true;
        } else {
            return false;
        }
    }
}
