<?php
/**
 * CategoryTest.php
 * 
 * PHP version 8.2
 * 
 * @category  Test
 * @package   App\Tests\Feature
 * @author    Orcun Candan <orcuncandan@gmail.com>
 * @copyright 2024 Orcun Candan
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/orcuncandan/orcCommerce
 */
use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);

describe(
    'Category Test Cases', 
    function () {
        uses(RefreshDatabase::class);

        /**
         * Create token and set prefix
         */
        beforeEach(
            function () {
                $this->prefix='api/admin/categories';
                $user = \App\Models\User::factory()->create();
                $this->userToken = $user->createToken('api-token')->plainTextToken;
            }
        );
        
        /**
         * Create
         */
        test(
            'Create', 
            function () {
                
                $response=$this->withToken($this->userToken)
                    ->post(
                        $this->prefix, 
                        [
                            'name' => 'Category',
                            'slug' => 'category',
                            'description' => 'Category description',
                            'parent_id' => null,
                        ]
                    );
                // $response->assertStatus(200);
                $response->assertJsonStructure(
                    [
                        'id',
                        'name',
                        'slug',
                        'description',
                        'parent_id',
                        'created_at',
                        'updated_at',
                    ]
                );
            }
        );

        /**
         * Get One
         */
        test(
            'Get One',
            function () {
                $category = \App\Models\Category::factory()->create();
                $response=$this->withToken($this->userToken)
                    ->get(
                        $this->prefix.'/'.$category->id
                    );
                $response->assertStatus(200);
                $response->assertJsonStructure(
                    [
                        'id',
                        'name',
                        'slug',
                        'description',
                        'parent_id',
                        'created_at',
                        'updated_at',
                    ]
                );
            }   
        );

        /**
         * Update
         */
        test(
            'Update',
            function () {
                $category = \App\Models\Category::factory()->create();
                $response=$this->withToken($this->userToken)
                    ->put(
                        $this->prefix.'/'.$category->id,
                        [
                            'name' => 'Category',
                            'slug' => 'category',
                            'description' => 'Category description',
                            'parent_id' => null,
                        ]
                    );
                $response->assertStatus(200);
                $response->assertJsonStructure(
                    [
                        'id',
                        'name',
                        'slug',
                        'description',
                        'parent_id',
                        'created_at',
                        'updated_at',
                    ]
                );
            }   
        );

        /**
         * Delete
         */
        test(
            'Delete',
            function () {
                $category = \App\Models\Category::factory()->create();
                $response=$this->withToken($this->userToken)
                    ->delete(
                        $this->prefix.'/'.$category->id
                    );
                $response->assertStatus(200);
                $categoryExists=\App\Models\Category::
                    where('id', $category->id)->exists();
                $this->assertFalse($categoryExists);
            }   
        );

        /**
         * Get All
         */
        test(
            'Get All',
            function () {
                \App\Models\Category::factory()->count(5)->make();
                $response=$this->withToken($this->userToken)
                    ->get(
                        $this->prefix
                    );
                $response->assertStatus(200);
                $response->assertJsonStructure(
                    [
                        '*' => [
                            'id',
                            'name',
                            'slug',
                            'description',
                            'parent_id',
                            'created_at',
                            'updated_at',
                        ]
                    ]
                );
            }   
        );
    }
);