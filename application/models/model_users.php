<?php
class Model_Users extends Model   //модель для работы с таблицей accounts
{
	public function __construct()
	{
		parent::__construct();
		//echo md5('test');
		print_r($_POST);
	}
	function add_user()
	{
		
	}
	function find_user() //функция авторизации пользователя
	{
		echo "Hello <br/>";
		$sth = $this->db->prepare("SELECT id FROM accounts WHERE username = :username  AND password = :password");
   		$sth->execute(array(
							':username'=>$_POST['username'], 
							':password' => $_POST['password'])
   					);

    	/*$result = $sth->fetchAll();
		print_r($result);*/

		$count = $sth->rowCount();
		if($count > 0)
		{
			//logged in
			Session::init();
			Session::set('loggedIn', true);
			header('location: ../dashboard');
		}
		else
		{
			header('location: ../login');
		}
		
	}
}