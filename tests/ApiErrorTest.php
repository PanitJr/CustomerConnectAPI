<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\CC\Loader;

class ApiErrorTest extends TestCase
{
   	use DatabaseTransactions;

    protected $recordModel;

	public function setUp()
	{
		$this->faker = Faker\Factory::create();
		parent::setUp();
		$user = factory(App\User::class)->make([
			"email"=>"test@mail.com",
			"password"=>Hash::make("1234567")
		]);
		$user->save();
		Auth::login($user);
	}

   	/**
	 * @covers class::GetHandlerNotFoundObject()
	 * @expectedException Exception
	 */
	public function testGetHandlerNotFoundObject()
	{
		$Classname = Loader::getObjectClassName("Not_found","Non_Object");				
	}


}
