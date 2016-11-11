<?php

namespace App\Object\ExpenseStatus;

use App\Object\CC\Entity;

class ExpenseStatus extends Entity
{
    public $table = 'cc_expensestatuss';

    public $timestamps = false;

    public $object_name = "ExpenseStatus";

    public $columns_list = [
        'expense_status_name'=>'expensestatusname'
    ];
}


