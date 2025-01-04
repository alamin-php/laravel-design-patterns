<?php

namespace App\Http\Controllers;

use App\Models\AccountLedger;
use App\Models\ChartOfAccount;
use Illuminate\Http\Request;

class AccountLedgerController extends Controller
{
    public function index()
    {
        $ledgers = AccountLedger::with('chartOfAccount')->latest()->get();
        return view('account_ledgers.index', compact('ledgers'));
    }

    public function create()
    {
        $chartOfAccounts = ChartOfAccount::all(); // Fetch all Chart of Accounts
        return view('account_ledgers.create', compact('chartOfAccounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ledger_name' => 'required|string|max:255',
            'chart_of_accounts_id' => 'required|exists:chart_of_accounts,id',
            'status' => 'required|boolean',
        ]);

        AccountLedger::create($request->all());

        return redirect()->route('account_ledgers.index')->with('success', 'Ledger created successfully.');
    }

    public function edit(AccountLedger $accountLedger)
    {
        $chartOfAccounts = ChartOfAccount::all(); // Fetch all Chart of Accounts
    return view('account_ledgers.edit', compact('accountLedger', 'chartOfAccounts'));
    }

    public function update(Request $request, AccountLedger $accountLedger)
    {
        $request->validate([
            'ledger_name' => 'required|string|max:255',
            'chart_of_accounts_id' => 'required|exists:chart_of_accounts,id',
            'status' => 'required|boolean',
        ]);

        $accountLedger->update($request->all());

        return redirect()->route('account_ledgers.index')->with('success', 'Ledger updated successfully.');
    }

    public function destroy(AccountLedger $accountLedger)
    {
        $accountLedger->delete();
        return redirect()->route('account_ledgers.index')->with('success', 'Ledger deleted successfully.');
    }
}
