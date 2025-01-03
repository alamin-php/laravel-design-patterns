<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use Illuminate\Http\Request;
use App\Helpers\ChartOfAccountsHelper;

class ChartOfAccountsController extends Controller
{
    public function index()
    {
        $accounts = ChartOfAccount::with('children')->whereNull('parent_id')->get();
        return view('chart_of_accounts.index', compact('accounts'));
    }


    public function create()
    {
        // Fetch all accounts to populate the parent dropdown
        $accounts = ChartOfAccount::all();

        // Fetch root-level types for category dropdown (e.g., Asset, Liability, etc.)
        $types = ['Asset', 'Liability', 'Income', 'Expense'];

        return view('chart_of_accounts.create', compact('accounts', 'types'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|in:Asset,Liability,Income,Expense',
            'parent_id' => 'nullable|exists:chart_of_accounts,id',
            'code' => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);

        // Create the account
        ChartOfAccount::create($request->all());

        // Redirect to the index page
        return redirect()->route('chart_of_accounts.index')->with('success', 'Account created successfully.');
    }

    public function edit(ChartOfAccount $chartOfAccount)
    {
        $accounts = ChartOfAccount::where('id', '!=', $chartOfAccount->id)->get();

        // dd($accounts);
        return view('chart_of_accounts.edit', [
            'account' => $chartOfAccount,
            'accounts' => $accounts,
        ]);
    }


    public function update(Request $request, ChartOfAccount $chartOfAccount)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|in:Asset,Liability,Income,Expense',
            'parent_id' => 'nullable|exists:chart_of_accounts,id',
            'code' => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);

        // Update the account
        $chartOfAccount->update($request->all());

        // Redirect to index
        return redirect()->route('chart_of_accounts.index')->with('success', 'Account updated successfully.');
    }

    public function destroy(ChartOfAccount $chartOfAccount)
    {
        $chartOfAccount->delete();
        return redirect()->route('chart_of_accounts.index')->with('success', 'Account deleted successfully.');
    }

}
