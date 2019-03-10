<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Material;
use Symfony\Component\Console\Output\ConsoleOutput;

class MaterialsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::transaction( function() {
            Material::truncate();
            $con = new ConsoleOutput();
            $faker = Faker\Factory::create();
            for ($i = 0; $i < 1000000; $i++) {
                Material::create([
                    'title' =>$faker->sentence(rand(2, 5)),
                    'content' =>$faker->sentence(rand(20, 30)),
                    'created_at' =>$faker->dateTime()->format("Y-m-d H:i:s"),
                    'deleted_at'=>rand(0, 100) ? 0 : $faker->dateTime()->format("Y-m-d H:i:s"),
                ]);
                if($i % 1000 === 0 ) {
                    $con->writeln("$i records");
                }
            }

        });
    }

}
