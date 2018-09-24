<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
        //
        // $first = factory(Post:class)->create();
        // $second = factory(Post:class)->create([
        //     'created_at' => \Carbon\Carbon::now()->subMonth
        // ]);
        // $posts = Post::archives();
        // $this->assertCount([[
    //         'year' => $first-> created_at->formart('Y'),
    //         'month' => $first-> created_at->formart('F'),
    //         'published' => 1
    //     ],
    //     [
    //         'year' => $second-> created_at->formart('Y'),
    //         'month' => $second-> created_at->formart('F'),
    //         'published' => 1
    //     ],
    // ], $posts)

    }
}
