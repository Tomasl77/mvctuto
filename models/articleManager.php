<?php 
class articleManager extends Model
{
	public function getArticles()
	{
		$this->getAll('user','Article');
	}
}

?>