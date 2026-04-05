<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Cria o Colar
        $p1 = Product::create([
            'sku' => 'COL-001',
            'name' => 'Colar Veneziana 45cm',
            'plating_details' => '50 milésimos de prata',
            'is_active' => true
        ]);

        ProductImage::create([
            'product_id' => $p1->id,
            'image_path' => 'produtos/colar.jpg',
            'is_main' => true
        ]);

        // Cria o Anel
        $p2 = Product::create([
            'sku' => 'ANE-022',
            'name' => 'Anel Solitário Cravejado',
            'plating_details' => 'Banho premium',
            'is_active' => true
        ]);

        ProductImage::create([
            'product_id' => $p2->id,
            'image_path' => 'produtos/anel.jpg',
            'is_main' => true
        ]);

        // Cria o Brinco
        $p3 = Product::create([
            'sku' => 'BRI-010',
            'name' => 'Brinco Argola Lisa',
            'plating_details' => 'Hipoalergênico',
            'is_active' => true
        ]);

        ProductImage::create([
            'product_id' => $p3->id,
            'image_path' => 'produtos/brinco.jpg',
            'is_main' => true
        ]);
    }
}