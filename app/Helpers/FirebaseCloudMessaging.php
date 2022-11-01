<?php

namespace App\Helpers;

class FirebaseCloudMessaging {
	protected $url;
	protected $api_key;
	protected $server_key;
	protected $api_sender;
	protected $headers;

	function __construct() {
		$this->url = 'https://fcm.googleapis.com/fcm/send';
		$this->server_key = env('FCM_SERVER_KEY');
		$this->setHeaders();
	}

	public function setHeaders() {
		$this->headers = array(
			'Authorization: key=' . $this->server_key,
			'Content-Type: application/json',
		);
	}

	public function send($notification, $custom_data, $topic = null, $fcm_token = []) {
		$default = [
			'icon' => 'default',
			'sound' => 'default',
			// 'badge' => 1
		];

		$data = array(
			'delay_while_idle' => false,
			'priority' => 'high',
			'content_available' => true,
			'time_to_live' => 0,
			// 'to' => '/topics/news',
			// 'registration_ids' => $registration_ids,
			'notification' => array_merge($default, $notification),
			'data' => array_merge($default, $custom_data),
		);

		if (count($fcm_token) == 0 && !is_null($topic)) {
			$data['to'] = '/topics/' . $topic;
		} else {
			$data['registration_ids'] = $fcm_token;
		}

		return $this->curl($data);
	}

	public function curl($data) {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		$result = curl_exec($ch);

		curl_close($ch);

		return $result;
	}

}