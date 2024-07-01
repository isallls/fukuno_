<?php

use App\Models\Cart; // Pastikan impor model Cart yang benar
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->timestamps();
        });

        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) { // Perbaiki kondisi loop
            Cart::create([
                'user_id' => $faker->numberBetween(1, 3),
                'product_id' => $faker->numberBetween(1, 10),
                'quantity' => $faker->numberBetween(1, 10),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
