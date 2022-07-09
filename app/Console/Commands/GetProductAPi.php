<?php

namespace App\Console\Commands;

use App\Helpers\Makeup;
use App\Models\Product;
use Illuminate\Console\Command;
use Exception;

class GetProductAPi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consultar a Api dos Produtos';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $request = new Makeup();

        $productsData = $request->getData();

        $productCount = count($productsData);

        if ($productCount > 0) {

            foreach ($productsData as $item) {

                if (!$this->checkProduct($item->id)) {

                    $data = [
                        'code'                  => $item->id,
                        'brand'                 => $item->brand,
                        'name'                  => $item->name,
                        'price'                 => $item->price,
                        'price_sign'            => $item->price_sign,
                        'currency'              => $item->currency,
                        'image_link'            => $item->image_link,
                        'product_link'          => $item->product_link,
                        'website_link'          => $item->website_link,
                        'description'           => $item->description,
                        'rating'                => $item->rating,
                        'category'              => $item->category,
                        'product_type'          => $item->product_type,
                        'created_at'            => $item->created_at,
                        'updated_at'            => $item->updated_at,
                        'product_api_url'       => $item->product_api_url,
                        'api_featured_image'    => $item->api_featured_image,
                    ];

                    $newProduct = Product::create($data);

                    if ($newProduct) {
                        foreach ($item->product_colors as $key => $value) {
                            if ($value->hex_value  && $value->colour_name) {
                                
                                $product_color = [
                                    'product_code'    => $data['code'],
                                    'hex_value'     => $value->hex_value,
                                    'colour_name'   => $value->colour_name
                                ];

                                $newProduct->ProductColor()->create($product_color);
                            }
                        }
                    }
                }
            }            
        }

        echo "consulta finalizada com sucesso. {$productCount} consultado(s)";

    }

    private function checkProduct($product)
    {
        $product = Product::where('code', $product)->get();

        return count($product) > 0 ? true : false;
    }
}
