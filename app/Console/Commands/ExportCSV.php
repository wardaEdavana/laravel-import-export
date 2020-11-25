<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Make;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ExportCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export CSV';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // get the car ford details
        $vehicles = Make::with('vehicles.images')->where('make_name', 'Ford')->get()->toArray();
      
        //headers
        $columns = array('Registration', 'Car Title', 'Price', 'VAT', 'Image');

        $file = fopen('php://temp', 'w');
        fputcsv($file, $columns);

        foreach($vehicles as $data) {
            foreach($data['vehicles'] as $vehicle ){                    
                fputcsv(
                    $file,
                     array(
                        $vehicle['license_plate'],
                        $vehicle['range'].' '.$vehicle['model'].' '.$vehicle['derivative'],
                        $vehicle['price'],
                        round($vehicle['price'] * 0.2, 2),
                        $vehicle['images'][0]['image_url']
                    )
                );
            }           
        }
        
        $current_timestamp = Carbon::now()->timestamp;
        Storage::disk('custom-ftp')->put($current_timestamp.'.csv', stream_get_contents($file, -1, 0));
        fclose($file);
        return $this->info('Report has been generated successfully');
    }   
    
}
