<?php

use App\Models\Gbr;
use Illuminate\Database\Seeder;

class GbrSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Gbr::class, 30)->create();
    }
}
