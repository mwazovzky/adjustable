<?php

namespace Tests\Feature;

use MWazovzky\Adjustable\Dummy;
use MWazovzky\Adjustable\Models\Adjustment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

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

    // /** @test */
    // public function it_can_fetch_adjustmets()
    // {
    //     $this->be(factory('App\User')->create());
    //     $this->dummy->update(['name' => 'NewName']);
    //     $response = $this->getJson("/model/{$this->dummy->id}/adjustments")->json();
    //     $this->assertCount(1, $response);
    // }
}
