<?php 

class controllerAcceuil
{
	private $_articleManager;
	private $_view;

	public function __construct($url)
	{
		if(isset($url) && count($url) > 1)
			throw new Exception("Page introuvable");
		else
			$this->article();	
	}
	private function article()
	{
		$this->_articleManager = new articleManager;
		$articles = $this->_articleManager->getArticles();

		require_once('views/viewAcceuil.php');
	}
}
?>