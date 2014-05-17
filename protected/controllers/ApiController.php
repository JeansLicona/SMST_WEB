<?php

class ApiController extends Controller
{
	public function actionAcceptRequest()
	{
		if(isset($_POST['token'])) {
			$this->_sendResponse(200, CJSON::encode(array('code' => 1)));
		} else {
			$this->_sendResponse(400, CJSON::encode(array('code' => 0)));
		}
	}

	public function actionCancelRequest()
	{
		if(isset($_POST['token'])) {
			$this->_sendResponse(200, CJSON::encode(array('code' => 1)));
		} else {
			$this->_sendResponse(400, CJSON::encode(array('code' => 0)));
		}
	}

	public function actionLocation()
	{
		if(isset($_POST['id_taxista']) && isset($_POST['latitude'])
			&& isset($_POST['longitude'])) {
			$id = $_POST['id_taxista'];
			$latitude = $_POST['latitude'];
			$longitude = $_POST['longitude'];
			$location = array(
				'id_taxista' => $id,
				'latitud' => $latitude,
				'longitud' => $longitude,
				);

			$this->_sendResponse(200, CJSON::encode(array('code' => 1)));
		} else {
			$this->_sendResponse(400, CJSON::encode(array('code' => 0)));
		}
	}

	public function actionReject()
	{
		if( isset($_POST['id_collection']) ) {
			$id_collection = $_POST['id_collection'];

			if($id_collection == null) {
				$this->_sendResponse(200, CJSON::encode(array('message' =>
					'No hay taxis disponibles.')));
			} else {
				$slicedItem = array_shift($id_collection);
				$this->_sendResponse(200, CJSON::encode(array($id_collection)));
			}
		} else {
			$this->_sendResponse(400, CJSON::encode(array('code' => 0)));
		}
		// if( isset($_POST['id_collection']) ) {
		// 	$this->_sendResponse(200, CJSON::encode(array('code' => 1)));
		// } else {
		// 	$this->_sendResponse(400, CJSON::encode(array('code' => 0)));
		// }
	}

	public function actionFinishRequest()
	{
		$this->render('finishRequest');
	}

	public function actionRegistrationIdStore()
	{
		if(isset($_POST['registration_id']) && isset($_POST['user_type'])) {
			$registration_id = $_POST['registration_id'];
			$userType = $_POST['userType'];

			Yii::app()->idStore->store( $registration_id, $user_type );

			$this->_sendResponse(200, CJSON::encode(array('code' => 1)));
		} else {
			$this->_sendResponse(400, CJSON::encode(array('code' => 0)));
		}
	}

	public function actionRequestTaxiFromCompany()
	{
		if(isset($_POST['latitude']) && isset($_POST['longitude'])
			&& isset($_POST['company_id'])) {

			$this->send( $_POST['latitude'], $_POST['longitude'] );

			$this->_sendResponse(200, CJSON::encode(array(
				'message'=>'Solicitud enviada exitosamente'
			)));
		} else {
			$this->_sendResponse(400, CJSON::encode(array('code' => 0)));
		}
	}

	public function actionLoginTaxista()
	{
		if(isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$userIdentity = new UserIdentity($username, $password);

			$attributes = $userIdentity->authenticate();
			unset( $attributes['password_hash'] );

			if($userIdentity->errorCode===UserIdentity::ERROR_NONE) {
				$token = $this->generateRandomString();
				$userIdentity = new UserIdentity($username, $password);
				$attributes = array();
				$attributes['username'] = $username;
				$attributes['token'] = $token;
				$attributes['code'] = 1;

				$this->_sendResponse(200, CJSON::encode(
					$attributes
				));
			} else {
				$this->_sendResponse(403, CJSON::encode(array('code' => 0)));
			}
		} else {
			$this->_sendResponse(400, CJSON::encode(array('code' => 0)));
		}
	}

	private function generateRandomString($length = 30)
	{
	    $characters =
	    	'0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}

	public function actionRequestTaxi()
	{
		// $this->render('requestTaxi');
		if(isset($_POST['latitude']) && isset($_POST['longitude'])) :

			//obtenemos las companias de taxi
			$taxistas = Taxista::model()->findAll( array(
				'select'=>'t.company_taxista',
			    'group'=>'t.company_taxista',
			    'distinct'=>true,
			));

			$companias;
			foreach ($taxistas as $taxista) {
				$companias[] = $taxista->company_taxista;
			}

			$this->_sendResponse(200, CJSON::encode($companias));
		else:
			$this->_sendResponse(400, CJSON::encode(array('code' => 0)));
		endif;
	}

	private function send($latitude, $longitude)
	{
		$url = 'https://android.googleapis.com/gcm/send';
		Yii::log( "Action send to: $url", CLogger::LEVEL_INFO );

		$data = CJSON::encode( array(
			'registration_ids' => array(
				'APA91bE4KYmwWa2IEyWhi-Bti3mvR-UyMEVdryW3rX1CdtHx_rZ_BngZT2pI9wkeZ8lSgBD-57csBN7fKge'.
				'-ytLtfu66VFJgYF5mYZ631YTurJo64QPWUKrfcB0aVR1h3TMD-uttnkmetPGEBJo7AMiByT1hvO5ENA'
			),
			'data' => array('latitude' => $latitude, 'longitude'=>$longitude, 'message'=>'Calle 35 #226 x30 y 32'),
		));
		Yii::log( "data: $data", CLogger::LEVEL_INFO );

		$options = array( 'http' => array(
	        'header'  => "Content-type: application/json\r\n".
	        			 "Authorization:key=AIzaSyCnvXGG7Q9N1sdip3vEdELiyLQHgVJCDMw\r\n",
	        'method'  => 'POST',
	        'content' => $data,
		), );
		Yii::log( 'options: ' . CJSON::encode($options), CLogger::LEVEL_INFO );

		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		Yii::log( "respuesta: $result", CLogger::LEVEL_INFO );
	}

	private function _sendResponse($status = 200, $body = '', $content_type =
		'text/html')
	{
	    // set the status
	    $status_header =
	    	'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
	    header($status_header);
	    // and the content type
	    header('Content-type: ' . $content_type);

	    // pages with body are easy
	    if($body != '')
	    {
	        // send the body
	        echo $body;
	    }
	    // we need to create the body if none is passed
	    else
	    {
	        // create some body messages
	        $message = '';

	        // this is purely optional, but makes the pages a little nicer to read
	        // for your users.  Since you won't likely send a lot of different status codes,
	        // this also shouldn't be too ponderous to maintain
	        switch($status)
	        {
	            case 401:
	                $message = 'You must be authorized to view this page.';
	                break;
	            case 404:
	                $message = 'The requested URL ' . $_SERVER['REQUEST_URI']
	                	. ' was not found.';
	                break;
	            case 500:
	                $message =
	                 'The server encountered an error processing your request.';
	                break;
	            case 501:
	                $message = 'The requested method is not implemented.';
	                break;
	        }

	        // servers don't always have a signature turned on
	        // (this is an apache directive "ServerSignature On")
	        $signature = ($_SERVER['SERVER_SIGNATURE'] == '')
	        	? $_SERVER['SERVER_SOFTWARE'] . ' Server at '
	        	. $_SERVER['SERVER_NAME'] . ' Port '
	        	. $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

	        // this should be templated in a real-world solution
	        $body = '
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
	<html>
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	    <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
	</head>
	<body>
	    <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
	    <p>' . $message . '</p>
	    <hr />
	    <address>' . $signature . '</address>
	</body>
	</html>';

	        echo $body;
	    }
	    Yii::app()->end();
	}

	private function _getStatusCodeMessage($status)
	{
	    // these could be stored in a .ini file and loaded
	    // via parse_ini_file()... however, this will suffice
	    // for an example
	    $codes = Array(
	        200 => 'OK',
	        400 => 'Bad Request',
	        401 => 'Unauthorized',
	        402 => 'Payment Required',
	        403 => 'Forbidden',
	        404 => 'Not Found',
	        500 => 'Internal Server Error',
	        501 => 'Not Implemented',
	    );
	    return (isset($codes[$status])) ? $codes[$status] : '';
	}
}