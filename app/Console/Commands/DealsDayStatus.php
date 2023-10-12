<?php

namespace App\Console\Commands;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DealsDayStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:DealsDayStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $current_date = \Carbon\Carbon::now()->format('Y-m-d');
        $products = \App\Models\Product::where('deals_day',1)->get();
        foreach ($products as $product){
            $input_date = \Carbon\Carbon::parse($product->deals_date);
            $difference = $input_date->diff($current_date)->format("%r%a");

            if ( $difference > 0 ){
               $single_pro = Product::where('id',$product->id)->first();
               $single_pro->deals_day = 0;
               $single_pro->sale_price = $single_pro->regular_price;
               $single_pro->update();
            }elseif( $difference == 0 ){
                $single_pro = Product::where('id',$product->id)->first();
                $single_pro->deals_day = 0;
                $single_pro->sale_price = $single_pro->regular_price;
                $single_pro->update();
            }elseif( $difference == -1 ){
                $single_pro = Product::where('id',$product->id)->first();
                $single_pro->deals_day = 0;
                $single_pro->sale_price = $single_pro->regular_price;
                $single_pro->update();
            }
            \Log::info($difference);
        }
    }
}
