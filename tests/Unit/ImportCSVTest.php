<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Artisan;

class ImportCSVTest extends TestCase
{
   
	// Test it has csv:import command
    public function test_it_has_import_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\ImportCSV::class));
    }

    // Test it can import csv and send mail
    public function test_it_can_import_csv()
    {
        $this->artisan('csv:import')
            ->expectsOutput('Data has been imported to database successfully')
            ->expectsOutput('Email has been sent successfully')
            ->assertExitCode(0);
    }
}
