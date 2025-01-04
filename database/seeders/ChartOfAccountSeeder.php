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
        ChartOfAccount::create(['name' => 'Assets', 'code'=>'100', 'type' => 'Asset','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Liabilities', 'code'=>'200', 'type' => 'Liability','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Income', 'code'=>'300', 'type' => 'Income','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Expense', 'code'=>'400', 'type' => 'Expense','isDeletable'=>false]);

        // Subcategories for Assets
        $asset = ChartOfAccount::where('name', 'Assets')->first();
        $non_current_asset = ChartOfAccount::create(['name' => 'Non Current Asset', 'parent_id' => $asset->id, 'type' => 'Asset','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Propetry plan and equipment', 'parent_id' => $non_current_asset->id, 'type' => 'Asset','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Investment', 'parent_id' => $non_current_asset->id, 'type' => 'Asset','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Perliminary expenses', 'parent_id' => $non_current_asset->id, 'type' => 'Asset','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Suspense accounts', 'parent_id' => $non_current_asset->id, 'type' => 'Asset','isDeletable'=>false]);
        $current_asset = ChartOfAccount::create(['name' => 'Current Asset', 'parent_id' => $asset->id, 'type' => 'Asset','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Customer Accounts', 'parent_id' => $current_asset->id, 'type' => 'Asset','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Cash in hand', 'parent_id' => $current_asset->id, 'type' => 'Asset','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Cash at bank', 'parent_id' => $current_asset->id, 'type' => 'Asset','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Advance pre-payment and deposit', 'parent_id' => $current_asset->id, 'type' => 'Asset','isDeletable'=>false]);

        // Subcategories for Liability
        $liability = ChartOfAccount::where('name', 'Liabilities')->first();
        $equity_and_share_liability = ChartOfAccount::create(['name' => 'Equity and Share', 'parent_id' => $liability->id, 'type' => 'Liability','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Capital accounts', 'parent_id' => $equity_and_share_liability->id, 'type' => 'Liability','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Reserve and surplus', 'parent_id' => $equity_and_share_liability->id, 'type' => 'Liability','isDeletable'=>false]);
        $non_current_liability = ChartOfAccount::create(['name' => 'Non Current Liability', 'parent_id' => $liability->id, 'type' => 'Liability','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Bank over draft accounts', 'parent_id' => $non_current_liability->id, 'type' => 'Liability','isDeletable'=>false]);
        $current_liability = ChartOfAccount::create(['name' => 'Current Liability', 'parent_id' => $liability->id, 'type' => 'Liability','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Supplier accrounts', 'parent_id' => $current_liability->id, 'type' => 'Liability','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Duties and taxes', 'parent_id' => $current_liability->id, 'type' => 'Liability','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Provisions', 'parent_id' => $current_liability->id, 'type' => 'Liability','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Profit and Loss Accounts', 'parent_id' => $liability->id, 'type' => 'Liability','isDeletable'=>false]);

        // Subcategories for Income
        $income = ChartOfAccount::where('name', 'Income')->first();
        ChartOfAccount::create(['name' => 'Sales Accounts', 'parent_id' => $income->id, 'type' => 'Income','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Direct Income', 'parent_id' => $income->id, 'type' => 'Income','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Indirect Income', 'parent_id' => $income->id, 'type' => 'Income','isDeletable'=>false]);

        // Subcategories for Expense
        $expense = ChartOfAccount::where('name', 'Expense')->first();
        ChartOfAccount::create(['name' => 'Purchase Accounts', 'parent_id' => $expense->id, 'type' => 'Expense','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Direct Expense', 'parent_id' => $expense->id, 'type' => 'Expense','isDeletable'=>false]);
        ChartOfAccount::create(['name' => 'Indirect Expense', 'parent_id' => $expense->id, 'type' => 'Expense','isDeletable'=>false]);
    }
}
