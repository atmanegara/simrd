<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_jenis_reklame".
 *
 * @property integer $id
 * @property string $jenis
 * @property string $keterangan
 */
class TblJenisReklame extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_jenis_reklame';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis', 'keterangan'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis' => 'Jenis',
            'keterangan' => 'Keterangan',
        ];
    }
    
    public static function getAlljnsreklame()
    {
        $data = TblJenisReklame::find()->all();
        
        return \yii\helpers\ArrayHelper::map($data, 'id', 'jenis');
    }
}
