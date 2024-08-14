<?php

namespace App\Http\Controllers;

use App\DataTables\CustomerListDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerListController extends Controller
{
    public function index(CustomerListDataTable $dataTable)
    {
        return $dataTable->render('admin.customer-list.index');
    }
}
