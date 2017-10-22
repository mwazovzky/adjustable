<?php

namespace Tests\Feature;

use Tests\Dummy;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdjustableTest extends TestCase
{
    use DatabaseMigrations;

    protected $dummy;

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
    function it_can_log_model_update()
    {
        $this->be(factory('App\User')->create());

        $this->dummy->update(['name' => 'NewName']);

        $this->assertDatabaseHas('adjustables', [
            'user_id' => auth()->id(),
            'adjustable_id' => $this->dummy->id,
            'before' => '{"name":"Mary"}',
            'after' => '{"name":"NewName"}',
        ]);
    }
}
