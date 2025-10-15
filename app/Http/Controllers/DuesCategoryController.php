<?php

namespace App\Http\Controllers;

use App\Models\DuesCategory;
use Illuminate\Http\Request;

class DuesCategoryController extends Controller
{
    public function index()
    {
        $categories = DuesCategory::all();
        return view('Admin.dues_categories', compact('categories'));
    }

    public function create()
    {
        return view('Admin.createduescategories');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'periode' => 'required|in:mingguan,bulanan,tahunan',
            'amount' => 'required|numeric',
        ]);

        DuesCategory::create($request->all());

        return redirect()->route('admin.dues_categories')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }


    public function update(Request $request, DuesCategory $duesCategory)
    {
        $request->validate([
            'name' => $request->name,
            'periode' => $request->periode,
            'amount' => $request->amount, // ✅ sesuai form & kolom
            'status' => $request->status,
            'description' => $request->description,
        ]);

    }

    public function destroy(DuesCategory $duesCategory)
    {
        $duesCategory->delete();
        return redirect()->route('admin.dues_categories')
                         ->with('success', 'Kategori berhasil dihapus.');
    }
}
