<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Models\Vehicle;
use App\Models\Image;
use App\Models\Make;
use App\Mail\sendMail;
use Illuminate\Support\Carbon;

class ImportCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To import CSV to DB';

    /**
     * @var string
     */   
    private $dbPath = __DIR__ . '/../../../Db/';

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
        
        $imported_data_count = $total_feed = 0;
        // read file if files exists
        if (($handle = fopen($this->dbPath.'/example_stock.csv', "r")) !== FALSE) {
            $csvs = [];
            while(! feof($handle)) {
               $csvs[] = fgetcsv($handle);
            }
            
            $column_index = '';
            $data_arr = [];
            $total_feed = count($csvs) - 1;

               
            foreach ($csvs as $key => $csv) {
                if ($key == 0) {
                    continue;
                } 
                if($key == 10) break;
               
               // get the make_id
                $make_id = '';
                if($csv[1] != ''){
                    $make_id = Make::firstOrCreate(['make_name' => trim($csv[1])])->id;                   
                }

                // set active to true if it is future date
                $active = false;
                $date = new Carbon;
                if($date <=  $csv[9] || $csv[9] == '0000-00-00')
                {
                    $active = true;
                } else {
                    $active = false;
                }

                $imported_data = [
                    'license_plate' => $csv[0],
                    'make_id' => $make_id,
                    'range' => $csv[2],
                    'model' => $csv[3],
                    'derivative' => $csv[4],
                    'price' => doubleval(str_replace(',', '', $csv[5])),
                    'colour' => $csv[6],
                    'mileage' => $csv[7],
                    'vehicle_type' => $csv[8],
                    'date_on_forecourt' => $csv[9],
                    'active' => $active
                    
                ];   

                $images = array_filter(explode(',', $csv[10]));

                // validation
                if($imported_data['price'] > 0 && count($images) >= 3 && $imported_data['license_plate'] != ''){
                    $lastId = Vehicle::create($imported_data)->id;
                    if($lastId){                        
                        foreach($images as $image){
                            $data[] = [
                                'vehicle_id' => $lastId,
                                'image_url' => $image,
                            ];                             
                        }

                        Image::insert($data);
                        unset($data);

                        $imported_data_count++;
                        $this->info('Row - '. $imported_data_count);
                        $this->info('Data has been imported to database successfully');
                        
                    }
                }

            }//end foreach


            $data = array(
                'total_vehicles' => $total_feed,
                'imported_data_count' => $imported_data_count,
                'failed_count' => $total_feed - $imported_data_count
            );

            $this->sendMailToClient($data);
          
        }
           
    }

    public function sendMailToClient($data){
      //send Mail 
        Mail::send('emails.sendImportStatusReport', $data, function ($message) {

            $message->from('warda.india@gmail.com');
            $message->to('warda.india@gmail.com')->subject('Vehicles Status Report');

        });
        return $this->info('Email has been sent successfully');
    }

  
}
