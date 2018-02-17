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
use app\models\User;
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
		'supportsCredentials' => false,
    	'allowedOrigins' => ['*'],
    	'allowedHeaders' => ['Content-Type', 'X-Requested-With'],
  		'allowedMethods' => ['*'], // ex: ['GET', 'POST', 'PUT',  'DELETE']
    	'exposedHeaders' => [],
  		'maxAge' => 0,
		/*'Origin' => static ::allowedDomains() , 'Access-Control-Request-Method' => ['POST', 'GET'], 'Access-Control-Allow-Credentials' => true, 'Access-Control-Max-Age' => 15600, // Cache (seconds)*/
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
      "enseigne_id" :"",
      "enseigne_name": "",
      "enseigne_points": ""
     
    }
  ]


,
{["error"]}
------------------exemple d'appel ---------------
{ "Parameters" : {
    "user_id" : "18"
 
  }
}
------------------exemple de réponse ---------------
{  
   "Response":[  
      {  
         "enseigne_id":20,
         "enseigne_name":"Pomme de Pain",
         "enseigne_points":120
      },
      {  
         "enseigne_id":23,
         "enseigne_name":"Amoud",
         "enseigne_points":200
      },
      {  
         "enseigne_id":24,
         "enseigne_name":"venezia_ice",
         "enseigne_points":50
      },
      {  
         "enseigne_id":25,
         "enseigne_name":"webmania",
         "enseigne_points":50
      }
   ]
}
------------------data types --------------------
"enseigne_id" ; integer
"esneigne_name ": string 
"enseigne_points" : integer 
)
	    */
public function actionListeenseigne() /* la méthode utilisé pour  est GET {parmaeter}*/
		{
			Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
			$post = file_get_contents("php://input");
			$data = Json::decode($post, true);
			$request = Yii::$app->request;
		


			if ($request->isPost)
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
					
						 $points[$i] = ['enseigne_id'=>$enseigne_has[$i]['enseigne_id'] ,'enseigne_name'=>$nom_ens['name'],'enseigne_points'=>$enseigne_has[$i]['number_points_sum' ] ];
					

					}
 
					print_r(Json::encode(['Response' =>$points]));
				}
				
				else
				{
					
					echo 	Json::encode(['Response' =>'error uswith id '.$id.'is not found ']);
				}
				
			}

			



		}


		public function actionListerecompense() /* la méthode utilisé pour  est GET {parmaeter}*/
		{
			Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
			$post = file_get_contents("php://input");
			$data = Json::decode($post, true);
			$request = Yii::$app->request;
		


			if ($request->isPost)
			{
					$id = $data["Parameters"]["enseigne_id"];
			

				$login = Enseigne::find()->where(['enseigne_id' => $id])->one();
				if ($login )
				{ 
						
					
					


					
						 $points = [ 'recompenses'=>ArrayHelper::map(offer::find()->where(['enseigne_id' =>$id ])->all(),'title','points')];
					

					
 
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
		


			if ($request->isPost)
			{
					$email = $data["Parameters"]["email"];
			$password = $data["Parameters"]["password"];

				$login = Customer::find()->where(['email' => $email])->one();
				if ($login)
				{
					if($login->validatePassword($password))
					{
					echo Json::encode(['Response' =>['prenom' =>$login['first_name'],'nom' =>$login['last_name'],'email' =>$login['email'], 'sexe' =>$login['gender'], 'telephone' =>$login['phone'], 'date_naissance' =>$login['birthday'],'date_creation' =>$login['create_date'],       ]  ] );
					}
					else
					{
						echo Json::encode(['Response' => 'Error Password not Correct.']);

					}
				}
				else
				{

					echo Json::encode(['Response' => 'Error Email NOT Found.']);
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
	    public function actionLoginuser() /* la méthode utilisé pour l'inscription est GET {parmaeter}*/
		{
			Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
			$post = file_get_contents("php://input");
			$data = Json::decode($post, true);
			$request = Yii::$app->request;
		


			if ($request->isPOST)
			{
					$username = $data["Parameters"]["username"];
					$password = $data["Parameters"]["password"];

				$login = User::find()->where(['username' => $username])->one();
				if ($login && $login->validatePassword($password))
				{



					echo Json::encode(['Response' => $login]);
					
				}
				else
				{
					$login = User::find()->where(['email' => $username])->one();
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


		}
	public function actionSignup() /* la méthode utilisé pour l'inscription est post */
	{
		Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
		$post = file_get_contents("php://input");
		$data = Json::decode($post, true);
		$request = Yii::$app->request;
		$client =  new Customer();



	

		if ($request->isPost)
		{	
			$client->first_name  = $data["data"]["prenom"];
			$client->last_name = $data["data"]["nom"];
			$client->email  = $data["data"]["email"];
			$client->gender  = $data["data"]["sexe"];
			$client->phone  = $data["data"]["telephone"];
			$client->birthday  = $data["data"]["date_naissance"];
			$client->password  = $data["data"]["password"];
	   		$client->setPassword($client->password);
	     	$client->code = Yii::$app->security->generateRandomString().time();
			/* the request method is POST */
			
			if ($client->save())
			{
				echo Json::encode(['Response' => 'success']);
			}
			else
			{
				echo Json::encode(['Response' => 'Error']);
			}
		}
		else
			{ 
				echo Json::encode(['Response' => 'Error . No GET method Allowed.']);
			}
		}

		// $data=["success","error"];


		/*

			data :{
     
             email:"",
      
             password:"",
      
             nom:"",
      
             prenom:"",
     
             phone:"",
      
             dateN:"",
      
             sexe:"" }
  
          ]*/


          public function actionUpdateprofile() /* la méthode utilisé pour l'inscription est post */
	{
			Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
			$post = file_get_contents("php://input");
			$data = Json::decode($post, true);
			$request = Yii::$app->request;
		


	

		if ($request->isPost)
		{	
			
	     	$client = Customer::find()->where(['email'=>$data["data"]["email"]])->one();

			/* the request method is POST */
			if($client)
			{


					if($client->validatePassword($data["data"]["password"]))
					{
						
					    $client->last_name=$data["data"]["nom"];
						$client->first_name=$data["data"]["prenom"];
						$client->phone=$data["data"]["telephone"];
						$client->birthday=$data["data"]["date_naissance"];
						$client->gender=$data["data"]["sexe"];
						$client->last_update=gmdate("Y-m-d\TH:i:s\Z", time());
							if($client->save())
							{

								echo Json::encode(['Response' => 'Success .', 'Customer' =>$client]);


							}
							else
							{


								echo Json::encode(['Response' => 'Error .' , 'Type' => $client->getErrors()]);
							}
					}
					else
					{
						echo Json::encode(['Response' => 'Error . User found but wrong password !!.']);
					}
			}
			else
			{
				echo Json::encode(['Response' => 'Error . user not found !.']);
			}
			
			
		}
		else
			{ 
				echo Json::encode(['Response' => 'Error . No GET method Allowed.']);
			}
		}


		/*

{
  "Parameters": {
    "email": "afooz@thewebcompany.ma",
    "old_password": "124584788",
    "new_password":"hhkjh",
     "changed_by_user":"0"
  }
}



		*/
		 public function actionUpdatepassword() /* la méthode utilisé pour l'inscription est post */
	{
			Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
			$post = file_get_contents("php://input");
			$data = Json::decode($post, true);
			$request = Yii::$app->request;
		


	

		if ($request->isPost)
		{	
			
	     	$client = Customer::find()->where(['email'=>$data["Parameters"]["email"]])->one();
	     	

	     	$forgot = $data["Parameters"]["changed_by_user"];
	     	$new_pass= $data["Parameters"]["new_password"];
	     	$old_pass= $data["Parameters"]["old_password"];
			/* the request method is POST */
			if($client)
			{

					if($forgot=='0')
					{
					if($client->validatePassword($old_pass))
					{

						$client->setPassword($new_pass);
					  
						$client->last_update=gmdate("Y-m-d H:i:s", time());
							if($client->save())
							{

								echo Json::encode(['Response' => 'Success . The password have been modified succesfully']);


							}
							else
							{


								echo Json::encode(['Response' => 'Error .' , 'Type' => $client->getErrors()]);
							}
					}
					else
					{
						echo Json::encode(['Response' => 'Error . User found but wrong password !!.']);
					}
			}
			else
			{
$client->optin_email=1;
	     	$client->optin_sms=1;
$mot=Yii::$app->security->generateRandomString(9);
						$client->setPassword($mot);
						$client->last_update=gmdate("Y-m-d H:i:s", time());
						if($client->save())
							{

								echo Json::encode(['Response' => 'Success . The password have been modified succesfully']);
								 $url='<div style="background-color:#f2f3f5;padding:20px">
            <div style="max-width:600px;margin:0 auto">
                <div style="background:#fff;font:14px sans-serif;color:#686f7a;border-top:4px solid #428BCA;margin-bottom:20px">
                    
                        <div style="border-bottom:1px solid #f2f3f5;padding:20px 30px">
                            
                                <img id="m_-9168164051112753470m_-7380215566446000689m_2278659066782560706logo" style="max-width:99px;display:block" src= "http://afooz.thewebcompany.ma/images/logo-primary.png" alt="Afooz" class="CToWUd" width="150">
                            
                        </div>
                    
                    
                        
                        <div style="padding:20px 30px">
                            <div style="font-size:16px;line-height:1.5em;border-bottom:1px solid #f2f3f5;padding-bottom:10px;margin-bottom:20px">
                                
                                    <p><a style="text-decoration:none;color:#000">
                                        
                                            
                                                Bonjour '.$client->last_name.' '.$client->first_name.' ,
                                            
                                        
                                    </a></p>
                                
                                
                                    
                                <p><a style="text-decoration:none;color:#000">Une réinitialisation du mot de passe de votre compte a été demandée.</a></p>
                                    
                                <p><a style="text-decoration:none;color:#000">Voici Vôtre Nouveau Mot de passe</a></p>
                                <p><a style="text-decoration:none;color:red">'.$mot.'</a></p>
                                    
                                
                                
                                    
                                        
                                    
                                
                            </div>
                        </div>
                    
                    
                        
                    
                </div>
              
            </div>
        </div>';
        //->setTo($user->email)
             Yii::$app->mailer->compose()
    ->setFrom('afooz@thewebcompany.ma')
    ->setTo($client->email)
    ->setSubject('Message subject')
    ->setTextBody('AFOOZ - Reintialisation Mot de Passe')
    ->setHtmlBody($url)
    ->send();
echo Json::encode(['Response' => 'Success . The password have been modified succesfully , new password sent to user ']);


							}
							else
							{


								echo Json::encode(['Response' => 'Error .' , 'Type' => $client->getErrors()]);
							}





			}
		}
			else
			{
				echo Json::encode(['Response' => 'Error . user not found !.']);
			}
			
			
		}
		else
			{ 
				echo Json::encode(['Response' => 'Error . No GET method Allowed.']);
			}
		}
		 public function actionMescommercants() /* la méthode utilisé pour l'inscription est post */
	{
			Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
			$post = file_get_contents("php://input");
			$data = Json::decode($post, true);
			$request = Yii::$app->request;
		


	

		if ($request->isPost)
		{	
			
	     	$client = Customer::find()->where(['email'=>$data["data"]["email"]])->one();

			/* the request method is POST */
			if($client)
			{


					if($client->validatePassword($data["data"]["password"]))
					{
						
					    $client->last_name=$data["data"]["nom"];
						$client->first_name=$data["data"]["prenom"];
						$client->phone=$data["data"]["telephone"];
						$client->birthday=$data["data"]["date_naissance"];
						$client->gender=$data["data"]["sexe"];
						$client->last_update=gmdate("Y-m-d\TH:i:s\Z", time());
							if($client->save())
							{

								echo Json::encode(['Response' => 'Success .', 'Customer' =>$client]);


							}
							else
							{


								echo Json::encode(['Response' => 'Error .' , 'Type' => $client->getErrors()]);
							}
					}
					else
					{
						echo Json::encode(['Response' => 'Error . User found but wrong password !!.']);
					}
			}
			else
			{
				echo Json::encode(['Response' => 'Error . user not found !.']);
			}
			
			
		}
		else
			{ 
				echo Json::encode(['Response' => 'Error . No GET method Allowed.']);
			}
		}


				 public function actionLinkfacebook() /* la méthode utilisé pour l'inscription est post */
		{
		

				Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

			$post = file_get_contents("php://input");

			$data = Json::decode($post, true);

			


			$request = Yii::$app->request;
		


	

		if ($request->isPost)
		{	
			$customer_id = $data['Parameters']['userId'];

			$customer = Customer::find()->where(['customer_id' => $customer_id])->one();
			if($customer)
			{

				echo Json::encode(['Response' => $customer ]);
			}
			else
			{

				echo Json::encode(['Response' => 'User not found .']);

			}
			
			
			
		}
		else
			{ 
				echo Json::encode(['Response' => 'Error . No GET method Allowed.']);
			}
		}


	
	
	
	
}
