<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
This class used for main functions of this application.
*/
class Api extends CI_Controller{

	private $favorite_links = array();
	private $favorite_tweets = array();
	private $consumer_key = "12580-e4b58e9df02a1a4aabed660a";
	private $request_token = "";
	private $access_token = "";
	private $username = "";

	//constructor
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('welcome_v');
	}

	public function app(){
		$this->load->view('user_v');
	}


	// //function for authenticating with Pocket.
	// public function pocketAuth(){

	// }

	//form calls this function.
	public function processform(){
		$twitter_username = $this->input->post('twitter_username');
		$this->getTwUserFavs($twitter_username); //this fills the $favorite_links array.
		if(count($this->favorite_links) < 1){
			$data = array('ok' => '0');
		}else{
			foreach ($this->favorite_links as $fl) {
				$this->addFavToPocket($fl);
			}
			$data = array('ok' => '1');
		}
		$this->load->view('result_v', $data);
	}

	//function for getting favorites of Twitter users.
	public function getTwUserFavs($tw_username = ""){
		if($tw_username == ""){
			redirect('api/app');
		}
		$u = "https://api.twitter.com/1/favorites.json?count=200&screen_name=$tw_username";
		$data = json_decode($this->curl->simple_get($u));
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";

		//For now, we only get the latest 200 favs.
		$i = 0;
		foreach ($data as $d) {
			$url = $this->getUrlFromTweet($d->text);
			if($url){
				$this->favorite_links[$i] = $url;
				// $this->favorite_tweets[$i] = $d->text; //for future updates
				$i++;
				//echo "i: ".$i."<br>";
			}
		}
		// echo "Fetched and printed!<br>";
		// echo count($this->favorite_links)."<br>";
		// $this->printArray();
	}

	//function for printing favorite_links array -- debug
	function printArray(){
		foreach ($this->favorite_links as $fl) {
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
	public function addFavToPocket($tweet_url){
		$request_url = "https://getpocket.com/v3/add";
		$ut = $this->session->userdata('access_token');
		$this->curl->simple_post($request_url, 
			array(
				'url'=> $tweet_url, 
				'consumer_key' => $this->consumer_key, 
				'access_token' => $ut
			)
		);
	}

	//function for connecting the app to Pocket.
	function connect(){
		if($this->session->userdata('username') != ""){
			redirect('/api/app');
		}else{
			$request_url = "https://getpocket.com/v3/oauth/request";
			$redirect_uri = site_url()."api/user";
			header("Content-Type: application/json; charset=UTF8");
			$this->request_token = $this->curl->simple_post($request_url, array('consumer_key'=> $this->consumer_key, 'redirect_uri' => $redirect_uri));
			//after getting request token, redirect user to Pocket.

			$t = str_replace(array('code='), array(''), $this->request_token);

			$pocket_url = "https://getpocket.com/auth/authorize?request_token=$t&redirect_uri=$redirect_uri?code=$t";
			redirect($pocket_url);
		}
	}

	//this function gets access_token and username.
	function user(){
		$code = $this->input->get('code');
		$auth_url = "https://getpocket.com/v3/oauth/authorize";
		$result = $this->curl->simple_post($auth_url, array('consumer_key'=> $this->consumer_key, 'code' => $code));

		$len1 = strlen("access_token=");
		$pos1 = strpos($result, "&");
		$this->access_token = substr($result, $len1, $pos1-$len1);
		$len2 = strlen("username=");
		$this->username = substr($result, $pos1+$len2+1);

		if($this->username != ""){
			//start a session
			$data = array(
               'username'  => $this->username,
               'access_token' => $this->access_token
            );

			$this->session->set_userdata($data);
			redirect('/api/app');
		}else{
			redirect('/');
		}
		// $data = array('username' => $this->username);
		// $this->load->view('user_v', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}