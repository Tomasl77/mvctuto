<?php 

class Article
{
	private $_id;
	private $_pseudo;
	private $_mail;
	private $_publicid;

	public function __construct(array $data)
	{
		$this->hydrate($data);
	}

	public function hydrate(array $data)
	{
		foreach ($data as $key => $value) 
		{
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	public function setid($id)
	{
		$id = (int) $id;

		if($id >0)
			$this->_id = $id;
	}
	public function setpseudo($pseudo)
	{
		if(is_string($pseudo))
			$this->_pseudo = $pseudo; 
	}
	public function setemail($mail)
	{
		 if(filter_var($mail, FILTER_VALIDATE_EMAIL))
		 	$this->_mail = $mail;
	}
	public function setpubid($pubid)
	{
		$pubid = (int) $pubid;

		if($pubid >0)
			$this->_pubid = $pubid;
	}

	public function id()
	{
		return $this->_id;
	}
	public function pseudo()
	{
		return $this->_pseudo();
	}
	public function email()
	{
		return $this->_mail;
	}
	public function pubid()
	{
		return $this->_pubid;
	}
}

?>