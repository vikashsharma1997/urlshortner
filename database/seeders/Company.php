<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Company extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            ['id' => 1, 'name' => 'Blue Horizon Technologies'],
            ['id' => 2, 'name' => 'GreenLeaf Industries'],
            ['id' => 3, 'name' => 'SwiftWave Solutions'],
            ['id' => 4, 'name' => 'IronPeak Manufacturing'],
            ['id' => 5, 'name' => 'BrightPath Consulting'],
            ['id' => 6, 'name' => 'NextGen Software Labs'],
            ['id' => 7, 'name' => 'SkyBridge Logistics'],
            ['id' => 8, 'name' => 'UrbanEdge Realty'],
            ['id' => 9, 'name' => 'Suncrest Energy'],
            ['id' => 10, 'name' => 'EverTrust Financial'],
            ['id' => 11, 'name' => 'NovaCore Systems'],
            ['id' => 12, 'name' => 'RedOak Timberworks'],
            ['id' => 13, 'name' => 'Starlight Media'],
            ['id' => 14, 'name' => 'PrimeWave Networks'],
            ['id' => 15, 'name' => 'ClearView Analytics'],
            ['id' => 16, 'name' => 'BrightForge Tools'],
            ['id' => 17, 'name' => 'AquaPure Waterworks'],
            ['id' => 18, 'name' => 'WhitePeak Consulting'],
            ['id' => 19, 'name' => 'SteelLine Fabrication'],
            ['id' => 20, 'name' => 'AmberSky Studios'],
            ['id' => 21, 'name' => 'GreenRoots Farming Co.'],
            ['id' => 22, 'name' => 'TechSphere Innovations'],
            ['id' => 23, 'name' => 'GoldenGate Imports'],
            ['id' => 24, 'name' => 'NorthStar Travel'],
            ['id' => 25, 'name' => 'CloudStream IT Solutions'],
            ['id' => 26, 'name' => 'EchoPoint Communications'],
            ['id' => 27, 'name' => 'BrightLeaf Marketing'],
            ['id' => 28, 'name' => 'VantagePoint Security'],
            ['id' => 29, 'name' => 'SummitWorks Construction'],
            ['id' => 30, 'name' => 'SilverLine Designs'],
            ['id' => 31, 'name' => 'CrystalClear Optics'],
            ['id' => 32, 'name' => 'TrueNorth Shipping'],
            ['id' => 33, 'name' => 'IronGate Hardware'],
            ['id' => 34, 'name' => 'BlueSky Apparel'],
            ['id' => 35, 'name' => 'BrightWave Digital'],
            ['id' => 36, 'name' => 'EverBright Healthcare'],
            ['id' => 37, 'name' => 'EcoFlow Energy'],
            ['id' => 38, 'name' => 'Redstone Solutions'],
            ['id' => 39, 'name' => 'ClearPath Legal'],
            ['id' => 40, 'name' => 'Skyline Interiors'],
            ['id' => 41, 'name' => 'NextStep Robotics'],
            ['id' => 42, 'name' => 'PureHarvest Organics'],
            ['id' => 43, 'name' => 'BrightTech Gadgets'],
            ['id' => 44, 'name' => 'UrbanGlow Lighting'],
            ['id' => 45, 'name' => 'BlueRiver Foods'],
            ['id' => 46, 'name' => 'SmartEdge Electronics'],
            ['id' => 47, 'name' => 'GoldenLeaf Brewing Co.'],
            ['id' => 48, 'name' => 'TrueWave Marine'],
            ['id' => 49, 'name' => 'IronRoot Engineering'],
            ['id' => 50, 'name' => 'BrightSky Ventures'],
        ]);
    }
}
