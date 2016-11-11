<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SettingLayoutTest extends TestCase
{
 	use DatabaseTransactions;

    public function setUp()
	{
		$this->faker = Faker\Factory::create();
		parent::setUp();
		$user = factory(App\User::class)->make([
			"email"=>"test@mail.com",
			"password"=>Hash::make("1234567"),
			"remember_token"=>"token_test_1234567"
		]);
		$user->save();
		Auth::login($user);
	}

    /**
     * @covers class::CallSettingsLayoutObjectAll()
     */
    public function testCallSettingsLayoutObjectAll()
    {
    	$response=$this->call("GET","api/Settings/Layout/objectAll",["token"=>"token_test_1234567"])->getData();
    	$this->assertTrue($response->success);
    }

   	/**
   	 * @covers class::CallLayoutByObjectAccounts()
   	 */
   	public function testCallLayoutByObjectAccounts()
   	{
   		$response=$this->call("GET","api/Settings/Layout/object/Brand",["token"=>"token_test_1234567"])->getData();
    	$this->assertTrue($response->success);
   	}
}
