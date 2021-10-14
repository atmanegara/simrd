<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;

/**
 * Description of pushonesignal
 *
 * @author amandit
 */

use Yii;
use yii\helpers\Html;
use yii\base\Component;
use yii\helpers\Json;
class Pushonesignal extends Component {
    
    public function pushmsg($title,$message){
    $response = $this->sendMessage($title,$message);
	$return["allresponses"] = $response;
	$return = Json::encode($return);
        return $return;
    }
 public function sendMessage($title,$message){
     
     
		$content = array(
			"en" => $message
			);
                $headings = [
                    'en'=>$title
                ];
		
		$fields = array(
			'app_id' => "228eb341-c72c-4ca1-9c93-a5420f09e8d8",
			'included_segments' => array('All'),
                    'url'=>'https://epajak.hulusungaitengahkab.go.id/',
                    //    'data' => array("foo" => "bar"),
			'contents' => $content,
                        'headings'=>$headings,
                        
		);
		
		$fields = json_encode($fields);
  
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
						'Authorization: Basic NzY1NDMzNjMtYjdiZC00M2RmLWEyNWQtMjRiZGE5YzQ2NTBk'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}
        
        
}
