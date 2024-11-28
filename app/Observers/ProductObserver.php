<?php

namespace App\Observers;

use App\Mail\ProductCreateMail;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class ProductObserver
{

    public function created(Product $product): void
    {
        Mail::to('sirojiddintojinazarov5@gmail.com')->send(new ProductCreateMail($product));
        
    }


    public function updated(Product $product): void
    {
        //
    }


    public function deleted(Product $product): void
    {
        //
    }


    public function restored(Product $product): void
    {
        //
    }


    public function forceDeleted(Product $product): void
    {
        //
    }
}
