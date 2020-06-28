<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /** @test */
    public function it_should_open_welcome_page() {
        $this->get('/')->assertStatus(200);
    }

}
