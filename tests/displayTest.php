<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class displayTest extends TestCase
{
	/**
	 * @covers class::mockUptest()
	 */
	public function testMockUptest()
	{
		$this->assertTrue(true);
	}
   	/**
	 * @covers class::RemoveObjectWithTool()
	 */
	// public function testRemoveObjectWithTool() {
	// 	$Object = App\CC\Tool\Object::where("name", "Products")->first();
	// 	$Object->remove();
	// 	$this->dontSeeInDatabase("objects_model", ["name" => "Products"]);
	// }

	/**
   	 * @covers class::MakeProduction()
   	 */
  //  	public function testMakeProduction()
  //  	{
  //  		$Object = new App\CC\Tool\Object();
		// $this->assertTrue($Object->inputEmpty());
		// $Object->input([
		// 	"objectname" => "Products",
		// 	"fieldlabel" => "Product Name",
		// ]);
		// $Object->make();

		// $this->seeInDatabase("objects_model", ["name" => "Products"]);
  //  	}
   	
   	/**
   	 * @covers class::createField()
   	 */
  //  	public function testCreateField()
  //  	{
  //  		$Block = App\CC\Tool\Block::find(6);

		// $field = new App\CC\Tool\Field();
		// $field->input([
		// 	"blockModel" => $Block,
		// 	"fieldname" => "description",
		// 	"fieldlabel" => "Description",
		// 	"fieldtype" => "text",
		// ]);
		// $Block->addField($field);
		// $this->assertTrue(\Schema::hasColumn('cc_promotions', 'Description'));
  //  	}
}
