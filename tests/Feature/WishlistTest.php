<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WishlistTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    //Make sure all the values are correct. Else, restore the db and then run tests.

    public function test_success_add_wishlist()
    {
        $formData = [
            'user_id' => 3,
            'book_id' => 1
        ];
        $response = [
            'status' => true        
        ];
        $this->post('http://127.0.0.1:8000/api/wishlist',$formData)
            ->assertStatus(200)
            ->assertJson($response);
    }

    public function test_failure_add_wishlist()
    {
        $formData = [
            'user_id' => 0,
            'book_id' => 5
        ];
        $response = [
            'status' => false        
        ];
        $this->post('http://127.0.0.1:8000/api/wishlist',$formData)
            ->assertStatus(200)
            ->assertJson($response);
    }

    public function test_success_update_wishlist()
    {
        $formData = [
            'user_id' => 1,
            'book_id' => 2
        ];
        
        $response = [
            'status' => true        
        ];

        $this->put('http://127.0.0.1:8000/api/wishlist/1',$formData)
            ->assertStatus(200)
            ->assertJson($response);
    }

    public function test_failure_update_wishlist()
    {
        $formData = [
            'user_id' => 2,
            'book_id' => 7
        ];
        $this->put('http://127.0.0.1:8000/api/wishlist/100',$formData)
            ->assertStatus(404);
    }

    public function test_success_delete_wishlist_entry()
    {   
        $response = [
            'status' => true        
        ];

        $this->delete('http://127.0.0.1:8000/api/wishlist/1')
            ->assertStatus(200)
            ->assertJson($response);
    }

    public function test_failure_delete_wishlist_entry()
    {   
        $this->delete('http://127.0.0.1:8000/api/wishlist/100')
            ->assertStatus(404);
    }
}
