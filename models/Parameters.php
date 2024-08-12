<?php

namespace app\models;

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
 *
 * @property ParametersImages $parameterIcon
 * @property ParametersImages $parameterIconGray
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
                $normalizedName = ParametersImages::normalizeName($this->icon->baseName);
                $fileName = "{$this->id}_icon";

                if ($this->parameterIcon) {
                    $oldFilePath = $this->parameterIcon->path;

                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $parametersImage = $this->parameterIcon ?? new ParametersImages();
                $parametersImage->parameter_id = $this->id;
                $parametersImage->path = "{$path}/{$fileName}.{$this->icon->extension}";
                $parametersImage->primary_name = $normalizedName;
                $parametersImage->icon_type = ParametersImages::TYPE_ICON;
                $parametersImage->save();

                $this->icon->saveAs("{$path}/{$fileName}.{$this->icon->extension}");
            }

            if ($this->iconGray) {
                $normalizedName = ParametersImages::normalizeName($this->iconGray->baseName);
                $fileName = "{$this->id}_iconGray";

                if ($this->parameterIcon) {
                    $oldFilePath = $this->parameterIconGray->path;

                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $parametersImage = $this->parameterIconGray ?? new ParametersImages();
                $parametersImage->parameter_id = $this->id;
                $parametersImage->path = "{$path}/{$fileName}.{$this->iconGray->extension}";
                $parametersImage->primary_name = $normalizedName;
                $parametersImage->icon_type = ParametersImages::TYPE_ICON_GRAY;
                $parametersImage->save();

                $this->iconGray->saveAs("{$path}/{$fileName}.{$this->iconGray->extension}");
            }

            return true;
        } else {
            return false;
        }
    }

    public function getParameterIcon()
    {
        return $this->hasOne(ParametersImages::class, ['parameter_id' => 'id'])
            ->where('icon_type = :type', [':type' => ParametersImages::TYPE_ICON]);
    }

    public function getParameterIconGray()
    {
        return $this->hasOne(ParametersImages::class, ['parameter_id' => 'id'])
            ->where('icon_type = :type', [':type' => ParametersImages::TYPE_ICON_GRAY]);
    }
}
