<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleModelTest extends TestCase
{
    // Want the database to look the same before each test run
    use DatabaseTransactions;

    /** @test */
    public function Example()
    {
        // Given
        // Create and persist data (in database) using model factories

        /****************************************************************/

        // When
        // Some specific condition is met

        /****************************************************************/

        // Then
        // Assertions go here
    }
}
