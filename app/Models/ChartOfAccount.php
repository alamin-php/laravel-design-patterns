<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    protected $fillable = ['name', 'code', 'parent_id', 'type', 'description','isDeletable'];

    // Self-referencing parent-child relationship
    public function parent()
    {
        return $this->belongsTo(ChartOfAccount::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ChartOfAccount::class, 'parent_id')->with('children');
    }

    public function accounts_ledger(){
        return $this->hasMany(AccountLedger::class, 'chart_of_accounts_id');
    }

    // Scope for filtering by type
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
}
