<?php

namespace App\Http\Controllers;
use App\DataTables\TransactionDataTable;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(TransactionDataTable $dataTable)
    {
        return $dataTable->render('admin.transaction.index');
    }
}
