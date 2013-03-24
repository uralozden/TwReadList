<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
This class used for main functions of this application.
*/
class Api extends CI_Controller{

	private $favorites_link = array();

	//constructor
	public function __construct(){
		parent::__construct();
	}

	//function for authenticating with Pocket.
	public function pocketAuth(){

	}

	//function for getting favorites of Twitter users.
	public function getTwUserFavs($tw_username){
		$u = "https://api.twitter.com/1/favorites.json?count=200&screen_name=$tw_username";
		$data = json_decode($this->curl->simple_get($u));
		//print_r($this->curl->simple_get($u));

		//For now, we only get the latest 200 favs.
		$i = 0;
		foreach ($data as $d) {
			$url = $this->getUrlFromTweet($d->text);
			if($url){
				$this->favorites_link[$i] = $url;
				$i++;
				//echo "i: ".$i."<br>";
			}
		}
		echo "Fetched and printed!<br>";
		echo count($this->favorites_link)."<br>";
		$this->printArray();
	}

	//function for printing favorites_link array -- debug
	function printArray(){
		foreach ($this->favorites_link as $fl) {
			echo $fl." <br>";
		}
	}

	//function finding the url inside a tweet.
	//returns the url, o/w returns 0.
	public function getUrlFromTweet($tweet){
		preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $tweet, $match);
		if(isset($match)){
			if(!empty($match[0])){
				return $match[0][0];
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	//function for transferring Tw favs to Pocket.
	public function addFavToPocket(){

	}



	###other appp
	//function for checking all the websites
	public function checkAllWebsites(){
		$result = $this->website->getAllWebsites();
		foreach ($result as $r) {
			$website = $r->url;
			$owner_id = $r->owner_id;
			$premium = $this->user->getPremiumType($owner_id);
			if($this->curl->simple_post('api/checkwebsitehealth', array('u'=> $website)) == "200"){
				//site is accessible do nothing, save logs
			}else{
				//not accessible, send notifications and save logs
				if($premium != 0){
					//send email and sms
				}else{
					//send email
				}

			}
		}
	}

	//function for adding new users
	public function signup(){
		$email = $this->input->post('email');
		if($this->user->isEmailAlreadyRegistered($email) != 0){
			return;
		}
		$password = $this->input->post('password');
		if($this->user->addNewUser($email, $password) != 0){
			echo 1;
		}else{
			echo 0;
		}
	}



	public function index(){
		echo $this->curl->simple_post('api/signup', array('email' => "hi@tounat.com", 'password' => "1234"));
		// if($this->curl->simple_post('api/checkwebsitehealth', array('u'=>'http://tounat.cm')) == "200"){
		// 	echo "tak!";
		// }else{
		// 	echo "nottak";
		// }
	}

	public function twitterfav($user){
		//https://api.twitter.com/1/favorites.json?count=5&screen_name=episod
		$u = "https://api.twitter.com/1/favorites.json?count=5&screen_name=$user";
		echo "<pre>";
		echo $this->curl->simple_get($u);
		echo "</pre>";
	}

	public function checkwebsitehealth(){
		$url = $this->input->post('u'); //a website address has to be posted.
		$agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";$ch=curl_init();
		curl_setopt ($ch, CURLOPT_URL,$url );
		curl_setopt($ch, CURLOPT_USERAGENT, $agent);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch,CURLOPT_VERBOSE,false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch,CURLOPT_SSLVERSION,3);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, FALSE);
		$page=curl_exec($ch);
		//echo curl_error($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if($httpcode == 200){
			echo "200"; //site is accessible.
		}else{
			return FALSE;
		}
	}
}
