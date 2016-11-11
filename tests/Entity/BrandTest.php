<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BrandTest extends TestCase
{
	protected $recordModel;

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
		$mockupData = [
			"brandcode"=>"MB",
			"brandname"=>"Mockup Brand"
			];
    	$recordModel = factory(App\Object\Brand\Brand::class)->make($mockupData);
    	$recordModel->save();
    	$this->recordModel = $recordModel;
	}

    /**
     * @covers class::getApiForOriginalDetail()
     */
    public function testGetApiForOriginalDetail()
    {
    	$testId = $this->recordModel->id;
		$response=$this->call("GET","api/Brand/detail/".$testId,["token"=>"token_test_1234567"])->getData();
		$this->assertTrue($response->success);
		$this->assertTrue(property_exists($response->data,"blocks"));
		$this->assertTrue(property_exists($response->data->blocks[0],"fields"));
    }

    /**
     * @covers class::getApiForOriginalEdit()
     */
    public function testGetApiForOriginalEdit()
    {
    	$testId = $this->recordModel->id;
		$response=$this->call("GET","api/Brand/edit/".$testId,["token"=>"token_test_1234567"])->getData();
		$this->assertTrue($response->success);
		$this->assertTrue(property_exists($response->data,"blocks"));
		$this->assertTrue(property_exists($response->data->blocks[0],"fields"));
    }

    ##			##
    #	Option   #
    ##			##
    

    public function addBrandOption($brand_id,$name,$sequence)
    {
		return $this->call("POST","api/Brand/options/".$brand_id."/edit",[
				"token"=>"token_test_1234567",
				"brand_id"=>$brand_id,
				"option_name"=>$name,
				"sequence"=>$sequence
			])->getData();	
    }

    /**
     * @covers class::AddNewOptionToBrand()
     */
    public function testAddNewOptionToBrand()
    {
    	$testId = $this->recordModel->id;
    	$response = $this->addBrandOption($testId,'Finishing',1);
		$this->assertTrue($response->success);
		$this->seeInDatabase('cc_brands_options', [
			"brand_id"=>$testId,
			"sequence"=>1,
			"option_name"=>"Finishing",
			"id"=>$response->data->id 
		] );
    }

    /**
     * @covers class::getListOptionAfterAddNewBrand()
     */
    public function testGetListOptionAfterAddNewBrand()
    {
    	$testId = $this->recordModel->id;
    	
    	#Add Option 2 Record
    	$this->assertTrue($this->addBrandOption($testId,'Finishing',1)->success);
		$this->assertTrue($this->addBrandOption($testId,'Fabric',2)->success);

		$response = $this->call("GET","api/Brand/options/".$testId."/list",[
				"token"=>"token_test_1234567",
			])->getData();
		$this->assertTrue($response->success);
		$this->assertEquals(2, count($response->data));
    }

    /**
     * @covers class::RenameOptionByApiAfterAddNewOption()
     */
    public function testRenameOptionByApiAfterAddNewOption()
    {
    	$testId = $this->recordModel->id;

    	#Add new option 
    	$responseOption = $this->addBrandOption($testId,'Finishing',1);
    	$this->assertTrue($responseOption->success);
		$optionId = $responseOption->data->id;

		$this->seeInDatabase('cc_brands_options', [
			"brand_id"=>$testId,
			"option_name"=>"Finishing",
			"id"=>$optionId 
		] );
    	
    	$this->call("POST","api/Brand/options/".$testId."/edit/".$optionId,[
				"token"=>"token_test_1234567",
				"option_name"=>"Fabric",
			])->getData();	
    	
    	$this->seeInDatabase('cc_brands_options', [
			"brand_id"=>$testId,
			"option_name"=>"Fabric",
			"id"=>$optionId 
		] );
    }

    /**
     * @covers class::RemoveOptionAfterAddNewOptionToBrand()
     */
    public function testRemoveOptionAfterAddNewOptionToBrand()
    {
    	$testId = $this->recordModel->id;
    	#Add new option 
    	$responseOption = $this->addBrandOption($testId,'Finishing',1);
    	$this->assertTrue($responseOption->success);
		$optionId = $responseOption->data->id;
		$this->seeInDatabase('cc_brands_options', [
			"brand_id"=>$testId,
			"option_name"=>"Finishing",
			"id"=>$optionId 
		] );
		
		$response = $this->call("POST","api/Brand/options/".$testId."/delete/".$optionId,[
				"token"=>"token_test_1234567",
			])->getData();	
		$this->assertTrue($response->success);

		$this->dontSeeInDatabase('cc_brands_options', [
			"brand_id"=>$testId,
			"option_name"=>"Finishing",
			"id"=>$optionId 
		] );
    }

    ##				##
    #	Option Data  #
    ##				##

    public function addBrandOptionData($option_id,$code,$name,$description)
    {
		return $this->call("POST","api/Brand/option_data/".$option_id."/edit",[
				"token"=>"token_test_1234567",
				"option_id"=>$option_id,
				"code"=>$code,
				"name"=>$name,
				"description"=>$description
			])->getData();	
    }

    /**
     * @covers class::AddNewOptionDataToNewOptionBrand()
     */
    public function testAddNewOptionDataToNewOptionBrand()
    {
    	$option_id = $this->addBrandOption
    				($this->recordModel->id,'Finishing',1)->data->id;
		$response =  $this->addBrandOptionData($option_id,"12G","12th Century Gold","12th Century Gold	For Test");   	
		$this->assertTrue($response->success);
		$this->seeInDatabase('cc_brands_options_data', [
			"option_id"=>$option_id,
			"code"=>"12G",
			"name"=>"12th Century Gold",
			"description"=>"12th Century Gold	For Test",
			"id"=>$response->data->id 
		] );
    }

    /**
     * @covers class::getListOptionDataAfterAddNewOption()
     */
    public function testGetListOptionDataAfterAddNewOption()
    {
    	$option_id = $this->addBrandOption
    				($this->recordModel->id,'Finishing',1)->data->id;
		
		$this->addBrandOptionData($option_id,"12G","12th Century Gold","12th Century Gold	For Test");
		$this->addBrandOptionData($option_id,"14G","14th Century Gold","14th Century Gold	For Test");

		$response = $this->call("GET","api/Brand/option_data/".$option_id."/list",[
				"token"=>"token_test_1234567",
			])->getData();
		$this->assertTrue($response->success);
		$this->assertEquals(2, count($response->data));
    }


    /**
     * @covers class::EditOptionDataAfterAddNewOptionData()
     */
    public function testEditOptionDataAfterAddNewOptionData()
    {
    	$option_id = $this->addBrandOption
    				($this->recordModel->id,'Finishing',1)->data->id;

    	#Add new option data
		$responseOption =  	$this->addBrandOptionData(
			$option_id,
			"12G",
			"12th Century Gold",
			"12th Century Gold	For Test");
    	$this->assertTrue($responseOption->success);
		$optionDataId = $responseOption->data->id;

		$this->seeInDatabase('cc_brands_options_data', [
			"option_id"=>$option_id,
			"code"=>"12G",
			"name"=>"12th Century Gold",
			"description"=>"12th Century Gold	For Test",
			"id"=>$optionDataId
		] );
    	
    	$this->call("POST","api/Brand/option_data/".$option_id."/edit/".$optionDataId,[
				"token"=>"token_test_1234567",
				"code"=>"16G",
				"name"=>"16th Century Gold",
				"description"=>"16th Century Gold	For Test",
			])->getData();	
    	
    	$this->seeInDatabase('cc_brands_options_data', [
			"option_id"=>$option_id,
			"code"=>"16G",
			"name"=>"16th Century Gold",
			"description"=>"16th Century Gold	For Test",
			"id"=>$optionDataId 
		] );
    }

    /**
     * @covers class::RemoveOptionDataAfterAddNewOptionDataToOption()
     */
    public function testRemoveOptionDataAfterAddNewOptionDataToOption()
    {
    	$option_id = $this->addBrandOption
    				($this->recordModel->id,'Finishing',1)->data->id;

    	#Add new option data
		$responseOption =  	$this->addBrandOptionData(
			$option_id,
			"12G",
			"12th Century Gold",
			"12th Century Gold	For Test");
    	$this->assertTrue($responseOption->success);
		$optionDataId = $responseOption->data->id;

		$this->seeInDatabase('cc_brands_options_data', [
			"option_id"=>$option_id,
			"code"=>"12G",
			"name"=>"12th Century Gold",
			"description"=>"12th Century Gold	For Test",
			"id"=>$optionDataId
		] );

		
		$response = $this->call("POST","api/Brand/option_data/".$option_id."/delete/".$optionDataId,[
				"token"=>"token_test_1234567",
			])->getData();	
		$this->assertTrue($response->success);

		$this->dontSeeInDatabase('cc_brands_options_data', [
			"option_id"=>$option_id,
			"code"=>"12G",
			"name"=>"12th Century Gold",
			"description"=>"12th Century Gold	For Test",
			"id"=>$optionDataId
		] );
    }


    /**
     * @covers class::SaveManageForBrandCodeFormatAndOptinSequence()
     */
    public function testSaveManageForBrandCodeFormatAndOptinSequence()
    {
    	$BrandId = $this->recordModel->id;
		
		$option1 = $this->addBrandOption($BrandId,'Finishing',1)->data->id;
		$option2 = $this->addBrandOption($BrandId,'Color',2)->data->id;

		$codeFormat = [
					[
						"data"=>"TSB",
						"type"=>"brandcode"
					],
					[
						"data"=>"-",
						"type"=>"text"
					],
					[
						"data"=>$option1,
						"type"=>"option"
					],
					[
						"data"=>$option2,
						"type"=>"option"
					]
				];
    	$response = $this->call("POST","api/Brand/manage/".$BrandId,
    		[
				"token"=>"token_test_1234567",
				"option_sequence"=>[
					$option2 => 1,
					$option1 => 2
				],
				"code_format"=>$codeFormat
			])->getData();	
		$this->assertTrue($response->success);
		$this->seeInDatabase('cc_brands_options', ["id"=>$option2,"sequence"=>1] );
		$this->seeInDatabase('cc_brands_options', ["id"=>$option1,"sequence"=>2] );
		$this->seeInDatabase('cc_brands', ["id"=>$BrandId,"code_format"=>json_encode($codeFormat)] );
    }
}
