<?php

namespace Tests\Unit;

use Tests\TestCase;

class ExportCSVTest extends TestCase
{
   // Test it has csv:export command
    public function test_it_has_export_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\ExportCSV::class));
    }

    // Test it can import csv and send mail
    public function test_it_can_export_csv()
    {
        $this->artisan('csv:export')
            ->expectsOutput('Report has been generated successfully')
            ->assertExitCode(0);
    }
}
