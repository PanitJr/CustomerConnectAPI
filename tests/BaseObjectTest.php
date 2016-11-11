<?php

class BaseObjectTest extends TestCase {
	/**
	 * @covers class::ObjectChackInputTool()
	 */
	public function testChackInputToolBaseObject() {
		$Object = new App\CC\Tool\Object();
		$this->assertTrue($Object->inputEmpty());
		$Object->input([
			"objectname" => "Accounts",
			"fieldlabel" => "Account Name",
		]);
		$this->assertFalse($Object->inputEmpty());
		$this->assertEquals('Accounts', $Object->getInput("objectname"));
	}

	/**
	 * @covers class::CreateRemoveObjectWithTool()
	 */
	public function testCreateObjectWithTool() {
		$Object = factory(App\CC\Tool\Object::class)->make()
			->input([
				"objectname" => "AccountsTestForTest",
				"fieldlabel" => "Account Name",
			]);
		$Object->make();

		$this->seeInDatabase("objects_model", ["name" => "AccountsTestForTest"]);
		$this->assertTrue(\Schema::hasTable('cc_accountstestfortests'));
		$this->assertTrue(File::exists(app_path("Object/AccountsTestForTest")), "Create Directoty Object");

		$this->assertTrue(File::exists(app_path("Object/AccountsTestForTest/AccountsTestForTest.php")), "Create Directoty Object");
		$this->assertTrue(class_exists("App\\Object\\AccountsTestForTest\\AccountsTestForTest"));
	}

	/**
	 * @covers class::seeBlockInDatabaseAfterCreateObject()
	 */
	public function testseeBlockInDatabaseAfterCreateObject() {
		$Object = App\CC\Tool\Object::where("name", "AccountsTestForTest")->first();
		$this->seeInDatabase("object_block", [
			"blocklabel" => "AccountsTestForTest Information",
			"objectid" => $Object->getId(),
		]);
	}

	/**
	 * @covers class::seeFieldIbDatabaseAfterCreateObject()
	 */
	public function testseeFieldIbDatabaseAfterCreateObject() {
		$Object = App\CC\Tool\Object::where("name", "AccountsTestForTest")->first();
		$this->seeInDatabase("object_field", [
			"fieldname" => "accountname",
			"fieldlabel" => "Account Name",
			"objectid" => $Object->getId(),
		]);
	}

	/**
	 * @covers class::seeFilterInDatabaseAfterCreateObject()
	 */
	public function testSeeFilterInDatabaseAfterCreateObject()
	{

		$Object = App\CC\Tool\Object::where("name","AccountsTestForTest")->first();
		$this->seeInDatabase("customview",[
			"viewname"=>"All",
			"setdefault"=>true,
			"objectid"=>$Object->getId()
		]);
	}

	/**
	 * @covers class::seeColumnsViewAfterCreateObject()
	 */
	public function testSeeColumnsViewAfterCreateObject()
	{
		$Object = App\CC\Tool\Object::where("name","AccountsTestForTest")->first();
		$Filter = App\CC\Tool\Filter::where("objectid",$Object->id)->first();
		$this->seeInDatabase("customview_columnslist",[
			"columnname"=>"accountname",
			"columnindex"=>0,
			"cvid"=>$Filter->getId()
		]);
	}		

	/**
	 * @covers class::AddNewFieldToObject()
	 */
	public function testAddNewFieldToObject() {
		$Object = App\CC\Tool\Object::where("name", "AccountsTestForTest")->first();
		$Block = App\CC\Tool\Block::where([
			"blocklabel" => "AccountsTestForTest Information",
			"objectid" => $Object->getId(),
		])->first();

		$field = new App\CC\Tool\Field();
		$field->input([
			"blockModel" => $Block,
			"fieldname" => "fieldnew",
			"fieldlabel" => "Field New",
			"fieldtype" => "string",
		]);
		$Block->addField($field);
		$this->seeInDatabase("object_field", [
			"fieldname" => "fieldnew",
			"fieldlabel" => "Field New",
			"objectid" => $Object->getId(),
		]);
		$this->assertTrue(\Schema::hasColumn('cc_accountstestfortests', 'fieldnew'));
	}
	/**
	 * @covers class::RemoveFieldInObject()
	 */
	public function testRemoveFieldInObject() {
		$Object = App\CC\Tool\Object::where("name", "AccountsTestForTest")->first();
		$dataTest = [
			"fieldname" => "fieldnew",
			"fieldlabel" => "Field New",
			"objectid" => $Object->getId(),
		];
		$this->seeInDatabase("object_field", $dataTest);
		$Field = App\CC\Tool\Field::where($dataTest)->first();
		$Field->remove();
		$this->dontSeeInDatabase("object_field", $dataTest);
	}
	/**
	 * @covers class::RemoveBlockInObject()
	 */
	public function testRemoveBlockInObject() {
		$Object = App\CC\Tool\Object::where("name", "AccountsTestForTest")->first();
		$dataTest = [
			"blocklabel" => "AccountsTestForTest Information",
			"objectid" => $Object->getId(),
		];
		$this->seeInDatabase("object_block", $dataTest);
		$Block = App\CC\Tool\Block::where($dataTest)->first();
		$Block->remove();
		$this->dontSeeInDatabase("object_block", $dataTest);
	}

	/**
	 * @covers class::RemoveObjectWithTool()
	 */
	public function testRemoveObjectWithTool() {
		$Object = App\CC\Tool\Object::where("name", "AccountsTestForTest")->first();
		$Object->remove();
		$this->dontSeeInDatabase("objects_model", ["name" => "AccountsTestForTest"]);
		$this->assertFalse(\Schema::hasTable('cc_accountstestfortests'));
		$this->assertFalse(File::exists(app_path("Object/AccountsTestForTest")), "Remove Directoty Object");
		$this->dontSeeInDatabase("object_block", [
			"blocklabel" => "AccountsTestForTest Information",
			"objectid" => $Object->getId(),
		]);
	}
}
