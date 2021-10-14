<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ref_about".
 *
 * @property string $id
 * @property string $kode_about
 * @property string $uraian
 */
class RefBerita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ref_berita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uraian'], 'string'],
            [['id'], 'string', 'max' => 160],
            [['kode_berita'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_berita' => 'Kode Berita',
            'uraian' => 'Uraian',
        ];
    }
}
