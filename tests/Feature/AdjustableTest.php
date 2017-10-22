<?php

namespace Tests\Feature;

use Tests\Dummy;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Mikewazovzky\Adjustable\Models\Adjustment;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdjustableTest extends TestCase
{
    use DatabaseMigrations;

    protected $dummy;

    /**
     * Create adjustable Dummy model and table
     *
     * @return void
     */
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
    function it_records_model_adjustments()
    {
        $this->be(factory('App\User')->create());

        $this->dummy->update(['name' => 'NewName']);

        $this->assertCount(1, $this->dummy->adjustments);

        $this->assertDatabaseHas('adjustables', [
            'user_id' => auth()->id(),
            'adjustable_id' => $this->dummy->id,
            'before' => '{"name":"Mary"}',
            'after' => '{"name":"NewName"}',
        ]);
    }
}
