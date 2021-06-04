<?php

namespace Tests\Feature;

use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PhpParser\Node\Expr\New_;
use Tests\TestCase;
use Webpatser\Uuid\Uuid;

class   OverallTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function only_logged_in_users_can_access_dashboard()
    {
        $response = $this->get('/home')->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function get_exchange_rates_from_api()
    {
        $response = (new HomeController())->currencyAPI()->getExchangeRates('EUR');
        $this->assertArrayHasKey('success', $response);
    }

    /**
     * @test
     */
    public function compare_currencies_test()
    {
        $response = (new HomeController())->currencyAPI()->compareCurrencies('EUR', 'USD', 10);
        $this->assertArrayHasKey('success', $response);
    }
}


