<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $primaryGroup = ProductType::create([
            'name' => 'Primary Group',
            'code' => 'PRIM-GRP',
            'parent_id' => null,
        ]);

        // Subgroups under Primary Group
        $finishedGoods = ProductType::create([
            'name' => 'Finished Goods',
            'code' => 'FIN-GDS',
            'parent_id' => $primaryGroup->id,
        ]);

        $rawMaterials = ProductType::create([
            'name' => 'Raw Materials',
            'code' => 'RAW-MAT',
            'parent_id' => $primaryGroup->id,
        ]);

        $shipmentGoods = ProductType::create([
            'name' => 'Shipment Goods',
            'code' => 'SHIP-GDS',
            'parent_id' => $rawMaterials->id,  // Under Raw Materials
        ]);

        // Additional Inventory Groups under Primary Group
        $electronics = ProductType::create([
            'name' => 'Electronics',
            'code' => 'ELECTRONICS',
            'parent_id' => $primaryGroup->id,
        ]);

        $mobilePhones = ProductType::create([
            'name' => 'Mobile Phones',
            'code' => 'MOBILE-PHONES',
            'parent_id' => $electronics->id, // Under Electronics
        ]);

        $laptops = ProductType::create([
            'name' => 'Laptops',
            'code' => 'LAPTOPS',
            'parent_id' => $electronics->id, // Under Electronics
        ]);
    }
}
