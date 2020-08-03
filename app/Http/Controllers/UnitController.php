<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $data = Unit::latest()->get();

        return view('admin.unit.index', compact('data'));
    }

    public function delete($id)
    {
        $data = Unit::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
