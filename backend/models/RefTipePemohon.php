<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_tipe_pemohon".
 *
 * @property integer $id
 * @property string $nama_tipe
 */
class RefTipePemohon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ref_tipe_pemohon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_tipe'], 'required'],
            [['nama_tipe'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_tipe' => 'Nama Tipe',
        ];
    }
    
    public static function gettipepemohon()
    {
        $array = RefTipePemohon::find()
                ->all();
        
        return \yii\helpers\ArrayHelper::map($array, 'id', 'nama_tipe');
    }
}
