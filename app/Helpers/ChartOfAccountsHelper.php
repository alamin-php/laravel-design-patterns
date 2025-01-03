<?php

namespace App\Helpers;

class ChartOfAccountsHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function renderTree($accounts, $level = 0)
    {
        $html = '';
        foreach ($accounts as $account) {
            $indent = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level);
            $html .= "<li>{$indent}{$account->name}</li>";

            if ($account->children->isNotEmpty()) {
                $html .= "<ul>" . self::renderTree($account->children, $level + 1) . "</ul>";
            }
        }
        return $html;
    }
}
