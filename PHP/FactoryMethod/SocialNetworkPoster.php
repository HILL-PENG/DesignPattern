<?php

namespace DesignPattern\PHP\FactoryMethod;

abstract class SocialNetwokPoster
{
	abstract public function getSocialNetwork();

	public function post($content)
	{
		$network = $this->getSocialNetwork();
		$network->login();
		$network->createPost($content);
		$network->logout();
	}
}

class FacebookPoster extends SocialNetwokPoster
{
	private $username;
	private $password;

	public function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}

	public function getSocialNetwork()
	{
		return new FacebookConnector($this->username, $this->password);
	}
}

class InstagramPoster extends SocialNetwokPoster
{
	private $email;
	private $password;

	public function __construct($email, $password)
	{
		$this->email = $email;
		$this->password = $password;
	}

	public function getSocialNetwork()
	{
		return new InstagramConnector($this->email, $this->password);
	}
}

interface SocialNetwokConnector
{
	public function login();

	public function logout();

	public function createPost($content);
}

class FacebookConnector implements SocialNetwokConnector
{
	private $username;
	private $password;

	public function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}

	public function login()
	{
		echo "log in Facebook account with username:$this->username and password:$this->password \n";
	}

	public function logout()
	{
		echo "log out Facebook account $this->username \n";
	}

	public function createPost($content)
	{
		echo "create a post in Facebook \n";
		echo "send message: $content \n";
	}
}

class InstagramConnector implements SocialNetwokConnector
{
	private $email;
	private $password;

	public function __construct($email, $password)
	{
		$this->email = $email;
		$this->password = $password;
	}

	public function login()
	{
		echo "log in Instagram account with email:$this->email and password:$this->password \n";
	}

	public function logout()
	{
		echo "log out Instagram account $this->email \n";
	}

	public function createPost($content)
	{
		echo "create a post in Instagram \n";
		echo "send message: $content \n";
	}
}

function clientCode(SocialNetwokPoster $creator)
{
	$creator->post("hello");
	echo "\n";
	$creator->post("morning");
}

$playFb = clientCode(new FacebookPoster('hill', '********'));
echo "\n";
$playIg = clientCode(new InstagramPoster('jane', '********'));