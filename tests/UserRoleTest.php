<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRoleTest extends TestCase
{
			use DatabaseTransactions;

			public function setUp()
			{
				parent::setUp();
			}

			/**
			 * @covers class::CreateRole()
			 */
			public function testCreateRole()
			{
				$role = factory(App\Role::class)->make();
				$rolename = $role->rolename;
				$role->save();
			 	$this->seeInDatabase('roles', ['rolename' => $rolename]);
			}
			/**
			 * @covers class::AssingRoleToUser()
			 */
			public function testAssingRoleToUser()
			{
				$role = factory(App\Role::class)->create();
	
				$user = factory(App\User::class)->create();
			
				$user->assingRole($role);
				$this->assertNotNull($user->roles()->find($role->id), 'Assing Role in user');
			}

			/**
			 * @covers class::addMultipleUserToRoleAndCallAllUserInRole()
			 */
			public function testAddMultipleUserToRoleAndCallAllUserInRole()
			{
				$role = factory(App\Role::class)->make();
				$role->save();
				$users = factory(App\User::class,4)->make();
				foreach ($users as $user) {
					$user->save();
					$user->assingRole($role);
				}
				$this->assertEquals(4, $role->users()->count());
			}

			/**
			 * @covers class::addNewRoleAndRemove()
			 */
			public function testAddNewRoleAndRemove()
			{
				$role = factory(App\Role::class)->make();
				$role->save();
				$roleId = $role->id;
		 		$this->seeInDatabase('roles', ['id' => $roleId]);
		 		$role->delete();
		 		$this->missingFromDatabase('roles',['id'=>$roleId]);
			}	

}
