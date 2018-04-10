<?php

class App {

	//Jos mitään ei ole valittu, valitaan home/index
	protected $controller = 'home';
	protected $method = 'index';

	protected $params = array();

	public function __construct() {


		//TESTI: print_r($this->parseUrl());
		$url = $this->parseUrl();

		//print_r($url);

		//Tarkistataan pyydetäänkö olemassa olevaa controlleria
		if(file_exists('../app/controllers/' . $url[0] . '.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}

		//Jos ei, niin ajetaan tämä
		require_once '../app/controllers/' . $this->controller . '.php';

		//echo $this->controller;

		//Luodaan uusi objekti
		$this->controller = new $this->controller;
		//var_dump($this->controller);

		//Testaanko on arrayn toinen elementti käytössä
		if(isset($url[1])) {
			if(method_exists($this->controller, $url[1])) {
				//echo 'OK!';
				$this->method =$url[1];
				unset($url[1]); 
			}

		}

		$this->params = $url ? array_values($url) : array();

		//Mikä on? Part 5/9
		call_user_func_array(array($this->controller, $this->method), $this->params);

		//print_r($url);
	}

	//Otetaan urli, pilkotaan, ja palautetaan arrayna käsiteltäväksi
	public function parseUrl() {
		if(isset($_GET['url'])) {
			//echo $_GET['url'];
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}



?>