<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    
	public $brandModel;

	public $idBrand = [];

	use DatabaseTransactions;

	public function setUp()
	{
		parent::setUp();
		$this->faker = Faker\Factory::create();
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
    	$brandModel = factory(App\Object\Brand\Brand::class)->make($mockupData);
    	$brandModel->save();
    	$this->brandModel = $brandModel;	
    	$BrandId = $brandModel->id;
    	$this->idBrand['Brand'] = $BrandId;
    	
    	$option1 = $this->addBrandOption($BrandId,'Finishing',1)->data->id;
		$this->idBrand['option1'] = $option1;
		
		$this->idBrand['option1_1'] =  $this->addBrandOptionData($option1,"12G","12th Century Gold","12th Century Gold	For Test")->data->id;
		$this->idBrand['option1_2'] = $this->addBrandOptionData($option1,"14G","14th Century Gold","14th Century Gold	For Test")->data->id;

		$option2 = $this->addBrandOption($BrandId,'Color',2)->data->id;
		$this->idBrand['option2'] = $option2;
		$this->idBrand['option2_1'] = $this->addBrandOptionData($option2,"R1","Red One","Red One For Test")->data->id;
		$this->idBrand['option2_2'] = $this->addBrandOptionData($option2,"B1","Blue One","Blue One For Test")->data->id;
		$codeFormat = [
					[
						"name"=>"MB",
						"type"=>"brandcode"
					],
					[
						"name"=>"-",
						"type"=>"text"
					],
					[
						"name"=>"Finishing",
						"id"=>$option1,
						"type"=>"option"
					],
					[
						"name"=>"Color",
						"id"=>$option2,
						"type"=>"option"
					]
				];
    	$this->call("POST","api/Brand/manage/".$BrandId,
    		[
				"token"=>"token_test_1234567",
				"option_sequence"=>[
					$option2 => 1,
					$option1 => 2
				],
				"code_format"=>$codeFormat
			])->getData();	
		
	}

	public function addBrandOption($brand_id,$name,$sequence)
    {
		return $this->call("POST","api/Brand/options/".$brand_id."/edit",[
				"token"=>"token_test_1234567",
				"brand_id"=>$brand_id,
				"option_name"=>$name,
				"sequence"=>$sequence
			])->getData();	
    }

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
     * @covers class::checkDataBrandAfterSetUp()
     */
    public function testCheckDataBrandAfterSetUp()
    {
	  	$this->seeInDatabase('cc_brands', [
	  		"id"=>$this->brandModel->id,
	  		"brandcode"=>"MB",
			"brandname"=>"Mockup Brand"
		]);
	  	
	  	$this->seeInDatabase('cc_brands_options', [
	  		"id"=>$this->idBrand['option1'],
	  		"option_name"=>"Finishing"
		]);

	  	$this->seeInDatabase('cc_brands_options', [
	  		"id"=>$this->idBrand['option2'],
	  		"option_name"=>"Color"
		]);

		$this->seeInDatabase('cc_brands_options_data', [
	  		"id"=>$this->idBrand['option1_1'],
	  		"code"=>"12G",
	  		"name"=>"12th Century Gold"
		]);

		$this->seeInDatabase('cc_brands_options_data', [
	  		"id"=>$this->idBrand['option1_2'],
	  		"code"=>"14G",
	  		"name"=>"14th Century Gold"
		]);

		$this->seeInDatabase('cc_brands_options_data', [
	  		"id"=>$this->idBrand['option2_1'],
	  		"code"=>"R1",
	  		"name"=>"Red One"
		]);

		$this->seeInDatabase('cc_brands_options_data', [
	  		"id"=>$this->idBrand['option2_2'],
	  		"code"=>"B1",
	  		"name"=>"Blue One"
		]);
    }

    public function getProduct()
    {
    	return [
			"token"=>"token_test_1234567",
			"productname"=>"Test Add Product",
			"modelcode"=>"0002",
			"brand"=>$this->idBrand['Brand'],
			"producttype"=>"Computer",
			"environment_image"=>"",
			"dimension_image"=>"",
			"product_image"=>"",
			"option_format"=>[
				"R1"=>[
					"option_id"=>$this->idBrand['option2'],
					"label"=>"Red One",
					"child"=>[
						"12G"=>[
							"option_id"=>$this->idBrand['option1'],
							"label"=>"12th Century Gold",
							"price"=>"3400"
						],
						"14G"=>[
							"option_id"=>$this->idBrand['option1'],
							"label"=>"14th Century Gold",
							"price"=>"3400"
						],
					]
				],
				"B1"=>[
					"option_id"=>$this->idBrand['option2'],
					"label"=>"Blue One",
					"child"=>[
						"12G"=>[
							"option_id"=>$this->idBrand['option1'],
							"label"=>"12th Century Gold",
							"price"=>"0"
						]
					]
				]
			]
		];
    }

 	/**
 	 * @covers class::AddProductByAPIandCheckInDataBase()
 	 */
 	public function testAddProductByAPIandCheckInDataBase()
 	{
 		
 		$product = $this->call("POST","api/Products/edit",$this->getProduct())->getData();
 		$this->assertTrue($product->success);
 		// $product->data->id
 		$this->seeInDatabase('cc_productss', [
	  		"id"=>$product->data->id,
	  		"productname"=>"Test Add Product",
			"modelcode"=>"0002",
			"brand"=>$this->idBrand['Brand'],
			"producttype"=>"Computer"
		]);

 		$this->seeInDatabase('cc_products_option', [
	  		"product_id"=>$product->data->id,
			"code"=>"MB-12GR1",
			"price"=>"3400",
		]);
 		$this->seeInDatabase('cc_products_option', [
	  		"product_id"=>$product->data->id,
			"code"=>"MB-14GR1",
			"price"=>"3400",
		]);
		$this->seeInDatabase('cc_products_option', [
	  		"product_id"=>$product->data->id,
			"code"=>"MB-12GB1",
			"price"=>"0",
		]);
 	}

 	/**
 	 * @covers class::RemoveProductOptionWhenOptionInBrandRemove()
 	 */
 	public function testRemoveProductOptionWhenOptionInBrandRemove()
 	{
 		$product = $this->call("POST","api/Products/edit",$this->getProduct())->getData();
 		$this->assertTrue($product->success);
 		$response = $this->call("POST","api/Brand/option_data/".$this->idBrand['option1']."/delete/".$this->idBrand['option1_1'],[
				"token"=>"token_test_1234567",
			])->getData();	
		$this->assertTrue($response->success);
			
		
 	}
}
