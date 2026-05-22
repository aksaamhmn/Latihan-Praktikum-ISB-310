<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthFeatureTest extends TestCase
{
    /**
     * Uji apakah halaman utama/login berhasil dirender (Status 200).
     */
    public function test_home_page_is_accessible()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Uji apakah endpoint Google Redirect mengembalikan status 302 (Redirect).
     */
    public function test_google_redirect_route()
    {
        $response = $this->get('/auth/google/redirect');

        // Memastikan aplikasi mencoba melakukan redirect ke sistem Google
        $response->assertStatus(302);
    }
}
