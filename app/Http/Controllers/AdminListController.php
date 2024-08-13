<?php

namespace App\Http\Controllers;

use App\DataTables\AdminListDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    public function index(AdminListDataTable $dataTable)
    {
        return $dataTable->render('admin.admin-list.index');
    }
}
