<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;
use Tests\Dummy;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdjustableTest extends TestCase
{
    use DatabaseMigrations;
    protected $dummy;

    public static function setUpBeforeClass()
    {
        echo 'Mikewazovzky\Adjustable Unit Tests ';
    }

    protected function setUp()
    {
        parent::setUp();

        Dummy::createTable();
        $this->dummy = Dummy::create(['name' => 'Mary']);
    }

    protected function tearDown()
    {
        Dummy::deleteTable();
    }

    /** @test */
    function it_does_something()
    {
        $this->assertTrue(true);
    }

    /** @test */
    function it_can_create_dummy_model()
    {
        $this->assertDatabaseHas('dummies', [
            'name' => $this->dummy->name
        ]);
    }

    /** @test */
    function it_can_log_dummy_model_update()
    {
        $this->be(factory('App\User')->create());

        $this->dummy->update(['name' => 'NewName']);

        // dd($this->dummy->adjustments);

        $this->assertDatabaseHas('adjustables', [
            'user_id' => Auth()->id(),
            'adjustable_id' => $this->dummy->id,
            'before' => '{"name":"Mary"}',
            'after' => '{"name":"NewName"}',
        ]);
    }
}
