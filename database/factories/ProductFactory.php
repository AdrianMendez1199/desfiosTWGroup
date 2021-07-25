<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Invoice;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Tarjeta de Video NVIDIA GEFORCE RTX 2080 TI',
            'quantity' => 1,
            'price' => 2399.99,
            'invoice_id' => Invoice::factory()
        ];
    }
}
