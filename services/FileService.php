<?php

namespace app\services;

use yii\web\UploadedFile;

class FileService
{
    const UPLOAD_PATH = 'uploads/';
    public $model;
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create($attribute): bool
    {
        $this->handleFileUpload($attribute);

        $this->model->save();
        return true;
    }

    public function update($attribute, $oldImage=null, $oldImageUz=null, $oldImageEn=null): bool
    {
        $this->handleFileUpload($attribute, $oldImage);

        $this->model->save();
        return true;
    }

    private function handleFileUpload($attribute, $oldValue=null): void
    {
        $file = UploadedFile::getInstance($this->model, $attribute);

        if ($file) {
            $filePath = self::UPLOAD_PATH . uniqid() . '.' . $file->extension;

            if ($file->saveAs($filePath)) {
                $this->model->$attribute = $filePath;
            }
        } elseif ($oldValue) {
            $this->model->$attribute = $oldValue;
        }
    }
}