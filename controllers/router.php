<?php 

class router{
	private $_ctrl;
	private $_view;

	public function routeReq(){
		try{
			//Autoload for class
			spl_autoload_register(function($class)
			{
				require_once('models/'.$class.'.php');
			});
			$url ='';

			if($isset($_GET['url']))
			{
				$url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

				$controller = ucfirst(strtolower($url[0]));
				$controllerClass = 'controller'.$controller;
				$controllerFile = 'controllers/'.$controllerClass.'.php';

				if(file_exists($controllerFile))
				{
					require_once($controllerFile);
					this->$_ctrl = new $controllerClass($url);
				} 
				else
				{
					throw new Exception("Page introuvable");
				}
			}
			else
			{
				require_once('controllers/controllerAcceuil.php');
				this->$_ctrl = new $controllerAcceuil($url);
			}
		}
		catch(Exception $e)
		{
			$errormsg = $e->getmessage();
			require_once('views/viewError.php');
		}
	}
}

 ?>