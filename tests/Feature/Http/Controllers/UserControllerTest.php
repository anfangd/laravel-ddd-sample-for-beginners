<?php
/**
 *
 */
namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

use Ulid\Ulid;
use Faker\Factory as Faker;

/**
 *
 */
class UserControllerTest extends TestCase
{
    use WithoutMiddleware;

    public function __construct()
    {
        parent::__construct();

        $this->faker = Faker::create();
    }

    /**
     * Test of HTTP GET Request.
     *
     * @return void
     */
    public function testHttpGetRequest()
    {
        $response = $this->get('/user');
        $response->assertStatus(200);
    }

    /**
     * Test of HTTP GET Request.
     *
     * @return void
     */
    public function testHttpPostRequest()
    {
        $response = $this->post('/user', [
            "id" => Ulid::generate()->__toString(),
            "name" => $this->faker->name()
            ]);
        $response->assertStatus(200);

        $response = $this->get('/user/1');
        $response->assertStatus(200);

        // $response = $this->post('/user', [
        //     "id" => "id002",
        //     "name" => "01"
        //     ]);
        // $response->assertStatus(500);
    }

    /**
     * Test of HTTP PUT Request.
     *
     * @return void
     */
    public function testHttpPutRequest()
    {
        $id = Ulid::generate()->__toString();
        $response = $this->post('/user', [
            "id" => $id,
            "name" => $this->faker->name()
            ]);

        $response = $this->put('/user/'.$id, [
            "id" => $id,
            "name" => $this->faker->name()
            ]);
        $response->assertStatus(200);
    }

    /**
     * Test of HTTP DELETE Request.
     *
     * @return void
     */
    public function testHttpDeleteRequest()
    {
        $id = Ulid::generate()->__toString();
        $response = $this->post('/user', [
            "id" => $id,
            "name" => $this->faker->name()
            ]);
        
        $response = $this->delete('/user/'.$id);
        $response->assertStatus(200);
    }
}
