<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "temp".
 *
 * @property integer $id
 * @property integer $ukuran1
 * @property string $satuan1
 * @property integer $ukuran2
 * @property string $satuan2
 * @property integer $sisi
 */
class Temp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ukuran1', 'ukuran2', 'sisi'], 'integer'],
            [['satuan1', 'satuan2'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ukuran1' => 'Ukuran1',
            'satuan1' => 'Satuan1',
            'ukuran2' => 'Ukuran2',
            'satuan2' => 'Satuan2',
            'sisi' => 'Sisi',
        ];
    }
}
