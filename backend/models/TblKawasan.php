<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_kawasan".
 *
 * @property integer $id
 * @property string $nama
 * @property string $keterangan
 * @property integer $persen
 */
class TblKawasan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_kawasan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persen'], 'integer'],
            [['nama', 'keterangan'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'keterangan' => 'Keterangan',
            'persen' => 'Persen',
        ];
    }
    public static function getAllKawasan(){
        $data = TblKawasan::find()->all();
        return \yii\helpers\ArrayHelper::map($data, 'id', 'nama');
    }
}
