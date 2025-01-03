<?php

namespace Database\Seeders;

use App\Models\ChartOfAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChartOfAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChartOfAccount::create(['name' => 'Assets', 'type' => 'Asset']);
        ChartOfAccount::create(['name' => 'Liabilities', 'type' => 'Liability']);
        ChartOfAccount::create(['name' => 'Income', 'type' => 'Income']);
        ChartOfAccount::create(['name' => 'Expense', 'type' => 'Expense']);

        // Subcategories for Assets
        $asset = ChartOfAccount::where('name', 'Assets')->first();
        ChartOfAccount::create(['name' => 'Non Current Asset', 'parent_id' => $asset->id, 'type' => 'Asset']);
        ChartOfAccount::create(['name' => 'Current Asset', 'parent_id' => $asset->id, 'type' => 'Asset']);
        // ChartOfAccount::create(['name' => 'Customer Accounts', 'parent_id' => $asset->id, 'type' => 'Asset']);

        // More nested accounts
        // $currentAsset = ChartOfAccount::where('name', 'Current Asset')->first();
        // ChartOfAccount::create(['name' => 'Dhaka Division', 'parent_id' => $currentAsset->id, 'type' => 'Asset']);
        // ChartOfAccount::create(['name' => 'Rangpur Division', 'parent_id' => $currentAsset->id, 'type' => 'Asset']);

        // // Nested regions
        // $dhaka = ChartOfAccount::where('name', 'Dhaka Division')->first();
        // ChartOfAccount::create(['name' => 'Dhaka District', 'parent_id' => $dhaka->id, 'type' => 'Asset']);
        // ChartOfAccount::create(['name' => 'Gazipur District', 'parent_id' => $dhaka->id, 'type' => 'Asset']);

        // $rangpur = ChartOfAccount::where('name', 'Rangpur Division')->first();
        // ChartOfAccount::create(['name' => 'Rangpur District', 'parent_id' => $rangpur->id, 'type' => 'Asset']);
        // ChartOfAccount::create(['name' => 'Pirgacha Thana', 'parent_id' => $rangpur->id, 'type' => 'Asset']);
    }
}
