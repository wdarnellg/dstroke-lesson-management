<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            'name' => '01 Lesson Pvt',
            'cost' => 55,
            'numberofhours' => 1,
            'type' => 'Private',
        ]);
        
        DB::table('packages')->insert([
            'name' => '04 Pack Pvt',
            'cost' => 165,
            'numberofhours' => 4,
            'type' => 'Private',
        ]);
        
        DB::table('packages')->insert([
            'name' => '06 Lesson Pvt',
            'cost' => 240,
            'numberofhours' => 6,
            'type' => 'Private',
        ]);
        
        DB::table('packages')->insert([
            'name' => '04 Lesson Semi',
            'cost' => 95,
            'numberofhours' => 4,
            'type' => 'Semi-Private',
        ]);
        
        DB::table('packages')->insert([
            'name' => '06 Lesson Semi',
            'cost' => 140,
            'numberofhours' => 6,
            'type' => 'Semi-Private',
        ]);
    }
}
