<?php

namespace App\Console\Commands;

use App\Mail\AlertMail;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ProductAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:product-alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $product = Product::where('stock_count','<=',5)
                    ->get();

            if ($product->count() > 0) {
                foreach ($product as $product) {
                    Mail::to($product)->send(new AlertMail($product));
                }
            }

            return 0;
        }
}
