<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Customer;
use app\models\EnseigneHasCustomer;
use app\models\customersearch;
use app\models\consomation;
use app\models\Enseigne;
use app\models\Offer;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
class ApiController extends ActiveController

{
	public $modelClass = 'app\models\Customer';

	public $enableCsrfValidation = false;
	public $api_key ='bc39b2d3a8d7450a3468ea93076963bd';

	public static

	function allowedDomains()
	{
		return ['*', // star allows all domains

		// 'http://localhost',

		];
	}

	/**
	 * @inheritdoc
	 */
	public

	function behaviors()
	{
		return array_merge(parent::behaviors() , [

		// For cross-domain AJAX request

		'corsFilter' => ['class' => \yii\filters\Cors::className() , 'cors' => [

		// restrict access to domains:

		'Origin' => static ::allowedDomains() , 'Access-Control-Request-Method' => ['POST', 'GET'], 'Access-Control-Allow-Credentials' => true, 'Access-Control-Max-Age' => 3600, // Cache (seconds)
		], ], ]);
	}



	    /*
	  
	================Recompense========================
		
		API CALL METHOD : GET

		Description : La méthode Renvoie la lite d'enseignes et l
		e nombre de points cumulés par enseigne et la 
		liste de récompenses possible par enseigne
		
		si succès : on renvoie les enseignes , les points cumulés par enseigne , et un tablleau de récompense et 
		leurs points 
		sinon : la réponse serait error.
		

 

 ----------------Structure----------------------
  "Response": [
    {
      "enseigne_name": "",
      "Sum_points": "",
      "recompenses": {
        "": ""
      }
    }
  ]
}
],
"error"]
------------------exemple d'appel ---------------
{ "Parameters" : {
    "user_id" : "18"
 
  }
}
------------------exemple de réponse ---------------
{
  "Response": [
    {
      "enseigne_name": "Pomme de Pain",
      "nombre_de_points": 120,
      "recompenses": {
        "Nespresso": 1000,
        "Spa": 1000,
        "Sandwich offert": 6
      }
    },
    {
      "enseigne_name": "Amoud",
      "nombre_de_points": 200,
      "recompenses": {
        "Viennoiserie": 200,
        "Gâteau de remerciement ": 20000
      }
    },
    {
      "enseigne_name": "venezia_ice",
      "nombre_de_points": 50,
      "recompenses": []
    }
  ]
}
------------------data types --------------------

"esneigne_name ": string 
"nombre de points" : integer 
"recompense ": object 
"recompense.tite ":string (first index)
"recompense.point ":integer (second index)
	    */
public function actionListeenseigne() /* la méthode utilisé pour  est GET {parmaeter}*/
		{
			Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
			$post = file_get_contents("php://input");
			$data = Json::decode($post, true);
			$request = Yii::$app->request;
		


			if ($request->isGet)
			{
					$id = $data["Parameters"]["user_id"];
			

				$login = Customer::find()->where(['customer_id' => $id])->one();
				if ($login )
				{ 
						$enseigne_has = EnseigneHasCustomer::find()->where(['customer_id' => $id])->all();
					
					for($i=0 ; $i < count($enseigne_has) ; $i++)
					{
						


						$enseigne = EnseigneHasCustomer::find()->where(['customer_id' => $id])->all();
						$nom_ens = Enseigne::find()->select('name')->where(['enseigne_id' => $enseigne_has[$i]['enseigne_id']])->one();
					
						 $points[$i] = ['enseigne_id'=>$enseigne_has[$i]['enseigne_id'] ,'enseigne_name'=>$nom_ens['name'],'Sum_points'=>$enseigne_has[$i]['number_points_sum' ] ];
					

					}
 
					echo 	Json::encode(['Response' =>$points]);
				}
				
				else
				{
					
					echo 	Json::encode(['Response' =>'error user with id '.$id.'is not found ']);
				}
			}



		}


		public function actionListerecompenses() /* la méthode utilisé pour  est GET {parmaeter}*/
		{
			Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
			$post = file_get_contents("php://input");
			$data = Json::decode($post, true);
			$request = Yii::$app->request;
		


			if ($request->isGet)
			{
					$id = $data["Parameters"]["user_id"];
			

				$login = Customer::find()->where(['customer_id' => $id])->one();
				if ($login )
				{ 
						$enseigne_has = EnseigneHasCustomer::find()->where(['customer_id' => $id])->all();
					
					for($i=0 ; $i < count($enseigne_has) ; $i++)
					{
						


						$enseigne = EnseigneHasCustomer::find()->where(['customer_id' => $id])->all();
						$nom_ens = Enseigne::find()->select('name')->where(['enseigne_id' => $enseigne_has[$i]['enseigne_id']])->one();
					
						 $points[$i] = [ 'enseigne_name'=>$nom_ens['name'],'Sum_points'=>$enseigne_has[$i]['number_points_sum' ] ];
					

					}
 
					echo 	Json::encode(['Response' =>$points]);
				}
				
				else
				{
					
					echo 	Json::encode(['Response' =>'error user with id '.$id.'is not found ']);
				}
			}



		}
		/*

	================Login========================
		
		API CALL METHOD : GET

		Description : La méthode Login vérifie 
		si un client  est inscrit à AFOOZ.
		si succès : on renvoie les champs de l'utilisateur
		sinon : la réponse serait error.
		

    ----------------Structure----------------------
		{
	    	"Parameters": 
	    	{
			    "email": "",
			    "password": "",
			
	  
	  		  },
	  		  
	   	   "response":
	   		[ 
	    		"sucess",
	      		"error"
	    	]
		} 
	------------------data types --------------------
	    "email": 	        VARCHAR(45)
	    "password": 		VARCHAR(45)





	*/

	public function actionScancustomer() /* la méthode utilisé pour l'inscription est GET {parmaeter}*/
		{
			Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
			$post = file_get_contents("php://input");
			$data = Json::decode($post, true);
			$request = Yii::$app->request;
		


			if ($request->isGet)
			{$point_de_vente_id = $enseigne_id = $data["Parameters"]["point_de_vente"];
					$code = $data["Parameters"]["user_code"];
					$enseigne_id = $data["Parameters"]["enseigne_id"];
				

				$login = Customer::find()->where(['code' => $code])->one();
				if ($login)
				{print_r($login);
					$inscri_enseigne= EnseigneHasCustomer::find()->where(['customer_id' => $login['customer_id']])->andwhere(['enseigne_id' => $enseigne_id])->one();
					if($inscri_enseigne)
					{
					echo Json::encode(['Response' => $login]);
					}
					else
					{
							$enseigne= enseigne::find()->where(['enseigne_id'=>$enseigne_id])->one();
							if($enseigne)
							{
			//					echo Json::encode(['Response' => 'Error : User not Subscribed ']);
							$enseigne_has_customer= new EnseigneHasCustomer();
							$enseigne_has_customer->enseigne_id =$enseigne_id;
							$enseigne_has_customer->customer_id= $login['customer_id'];
							$enseigne_has_customer->number_points_sum = $enseigne['pts_register'];
														if($enseigne_has_customer->save())
														{
															$consomation = new Consomation();
															$consomation->enseigne_has_customer_id = $enseigne_has_customer->enseigne_has_customer_id;
															$consomation->enseigne_id = $enseigne_id ;
															$consomation->point_de_vente_id = $point_de_vente_id;
															$consomation->points = $enseigne['pts_register'];
															$consomation->type_operation='credit';
															$consomation->description =' Nouvelle inscription ';

															if($consomation->save())
															{
																echo Json::encode(['Response' => 'Success ' ]);
																
															}
															else
															{
																print_r($consomation->geterrors() );
																echo Json::encode(['Response' => 'Error :  la consomation est anormalement invalide ' ]);

															}
															echo Json::encode(['Response' => 'yesyes' ]);
														}
														else
														{
															print_r($enseigne_has_customer->geterrors() );
															print_r($enseigne_has_customer);
															echo Json::encode(['Response' => 'Error : Liason de l\'enseigne et l \'utilisateur est anormalement invalide ' ]);
														}

							
								
						
					}
				
				else
					{
						echo Json::encode(['Response' => 'Error : Enseigne not found '.$enseigne_id]);
					}
				}
				
			}
			else
				{
					echo Json::encode(['Response' => 'Error : User not found ']);
				}


		}
	}
	
	public function actionLogin() /* la méthode utilisé pour l'inscription est GET {parmaeter}*/
		{
			Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
			$post = file_get_contents("php://input");
			$data = Json::decode($post, true);
			$request = Yii::$app->request;
		


			if ($request->isGet)
			{
					$email = $data["Parameters"]["email"];
			$password = $data["Parameters"]["password"];

				$login = Customer::find()->where(['email' => $email])->one();
				if ($login && $login->validatePassword($password))
				{
					echo Json::encode(['Response' => $login]);
				}
				else
				{
					echo Json::encode(['Response' => 'Error']);
				}
			}


		}
	/*

	================Signup========================

		API CALL METHOD : POST

		Description : Ldps sont
		requis .
		si succès : la reponse serait à succès
		sinon la réponse serait error  

    ----------------Structure----------------------
		{
	    	"data": 
	    	{
			    "prenom": "",
			    "nom": "",
			    "email": "",
			    "sexe": "",   
			    "telephone": "",
			    "date_naissance": "",
			    "password": ""
	  
	  		  },
	   	   "response":
	   		[ 
	    		"sucess",
	      		"error"
	    	]
		} 
	------------------data types --------------------
		"prenom" :  		VARCHAR(45)
		"nom":   			VARCHAR(45)
	    "email": 	        VARCHAR(45)
	    "sexe":   	 	    enum('femme', 'homme')	
	    "telephone":  		VARCHAR(45)
	    "date_naissance": 	date -> fomat(yyyy-mm--dd)
	    "password": 		VARCHAR(45)





	*/
	public function actionSignup() /* la méthode utilisé pour l'inscription est post */
	{
		Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
		$post = file_get_contents("php://input");
		$data = Json::decode($post, true);
		$request = Yii::$app->request;
		$client =  new Customer();



	

		if ($request->isPost)
		{$client->first_name  = $data["data"]["prenom"];
			$client->last_name = $data["data"]["nom"];
			$client->email  = $data["data"]["email"];
		

			$client->gender  = $data["data"]["sexe"];
		$client->phone  = $data["data"]["telephone"];
			$client->birthday  = $data["data"]["date_naissance"];
	$client->password  = $data["data"]["password"];
	   $client->setPassword($client->password);
			/* the request method is POST */
			
			if ($client->save())
			{
				echo Json::encode(['Response' => $client]);
			}
			else
			{
				echo Json::encode(['Response' => 'Error']);
			}
		}

		// $data=["success","error"];

	}
	
	
	
}
