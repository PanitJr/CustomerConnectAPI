<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\CC\Loader;

class CCLoaderTest extends TestCase
{
	/**
	 * @covers class::getHandlerObjectFoundObject()
	 */
	public function testGetHandlerObjectFoundObject()
	{
		$Classname = Loader::getObjectClassName("Brand","Brand");
		$this->assertEquals("\\App\\Object\\Brand\\Brand", $Classname);
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
