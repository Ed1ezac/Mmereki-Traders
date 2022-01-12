<?php

namespace Database\Seeders;

use App\Models\Trade;
use Illuminate\Database\Seeder;

class TradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Trade::create(['name' => 'Plumber']);
        Trade::create(['name' => 'Electrician']);
        Trade::create(['name' => 'Builder']);
        Trade::create(['name' => 'Gardener / Landscape Gardener']);
        Trade::create(['name' => 'Roofer']);
        Trade::create(['name' => 'Tiler']);
        Trade::create(['name' => 'Bathroom Fitter']);
        Trade::create(['name' => 'Pest Control']);
        Trade::create(['name' => 'Carpenter / Joiner']);
        Trade::create(['name' => 'Painter and Decorator']);
        Trade::create(['name' => 'Handyman']);
        Trade::create(['name' => 'Bricklayer']);
        Trade::create(['name' => 'Blacksmith / Metal Worker']);
        Trade::create(['name' => 'Removal Services']);
        Trade::create(['name' => 'Welder']);
        Trade::create(['name' => 'Fencing Specialist']);
        Trade::create(['name' => 'Repairman']);
        Trade::create(['name' => 'Window Fitter']);
        Trade::create(['name' => 'Plasterer']);
        Trade::create(['name' => 'Paving Specialist']);
        Trade::create(['name' => 'Air Conditioning Specialist']);
        Trade::create(['name' => 'Drainage Specialist']);
        Trade::create(['name' => 'Locksmith']);
        Trade::create(['name' => 'Architect']);
        Trade::create(['name' => 'Auto Mechanic']);
        Trade::create(['name' => 'Surveyor']);
        Trade::create(['name' => 'Shoe Repair Specialist']);
        Trade::create(['name' => 'Wardrobe Fitter']);
        Trade::create(['name' => 'Scaffolders']);
        Trade::create(['name' => 'Printing Services']);
        Trade::create(['name' => 'Swimming Pool Specialist']);
        Trade::create(['name' => 'Security Systems / CCTV / Alarms']);
        Trade::create(['name' => 'Stoneworker / Stonemason']);
        Trade::create(['name' => 'Floor Fitter']);
        Trade::create(['name' => 'Tree Surgeon']);  
        Trade::create(['name' => 'Kitchen Fitter / Kitchen Specialist']);
        Trade::create(['name' => 'Signs / Board Specialists']);
    }
}
