<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\User;
class userLoginApiTest extends TestCase
{
	use DatabaseTransactions;

	public function setUp()
	{
		parent::setUp();
		$user = factory(App\User::class)->make([
				"email"=>"test@mail.com",
				"password"=>Hash::make("1234567")
			]);
		$user->save();
	}

	/**
	 * @covers class::loginPassWithTestData()
	 */
	public function testLoginPassWithTestData()
	{	
		$this->post("api/login",["u"=>"test@mail.com","p"=>"1234567"])
			 ->seeJson([
                 'success' => true,
             ]);
	}
	/**
	 * @covers class::checkTokenLogin()
	 */
	public function testCheckTokenLogin()
	{
		$this->post("api/login",["u"=>"test@mail.com","p"=>"1234567"])
			 ->seeJsonStructure([
			 		"data"=>["token"]
			 	]);
	}

	/**
	 * @covers class::loginWithOutPost()
	 */
	public function testLoginWithOutPost()
	{
		$response = $this->call('GET',"api/login",["u"=>"test@mail.com","p"=>"1234567"])
			 ->status();
		$this->assertEquals(405, $response);
	}

	/**
	 * @covers class::LoginFailWithFakeUser()
	 */
	public function testLoginFailWithFakeUser()
	{
		$this->post("api/login",["u"=>"","p"=>""])
			 ->seeJson([
 	             'success' => false,
 	      ]);	
		$this->post("api/login",["u"=>"notuser@mail.com","p"=>"nopass"])
			 ->seeJson([
                 'success' => false,
             ]);		 
	}

	/**
	 * @covers class::CreateTokenAfterLogin()
	 */
	public function testCreateTokenAfterLogin()
	{
		$this->seeInDatabase('users', [
				'email' => 'test@mail.com',
				'remember_token'=>null
				]);
		$respond=$this->call("POST","api/login",["u"=>"test@mail.com","p"=>"1234567"])->getData();
		$this->token = $respond->data->token;
		$this->seeInDatabase('users', [
				'email' => 'test@mail.com',
				'remember_token'=>$this->token
				]);
	}	

	/**
	 * @covers class::LoginWithTokenPass()
	 */
	public function testLoginWithTokenPass()
	{
		$respond=$this->call("POST","api/login",["u"=>"test@mail.com","p"=>"1234567"])->getData();
		$token = $respond->data->token;
		$this->post("api/current_user",["token"=>$token]) 
			 ->seeJsonStructure(["success","data"=>["user"=>["email"]]]);
	}

	/**
	 * @covers class::LoginWithTokenFail()
	 */
	public function testLoginWithTokenFail()
	{
		$response=$this->call("POST","api/login",["u"=>"test@mail.com","p"=>"1234567"])->getData();
		$token = Hash::make($response->data->token); //Fake Token
		$this->post("api/current_user",["token"=>$token]) 
			 ->seeJson([
                 'success' => false,
             ]);
	}
}
