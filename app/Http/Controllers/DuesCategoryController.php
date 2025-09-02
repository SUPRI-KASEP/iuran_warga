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
            'name' => 'required|string|max:255',
            'periode' => 'required|in:bulanan,tahunan',
            'amount' => 'required|numeric',
            'status' => 'required|in:aktif,nonaktif',
            'description' => 'nullable|string'
        ]);

        DuesCategory::create($request->all());

        return redirect()->route('admin.dues_categories')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }


    public function update(Request $request, DuesCategory $duesCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'periode' => 'required|in:bulanan,tahunan',
            'amount' => 'required|numeric',
            'status' => 'required|in:aktif,nonaktif',
            'description' => 'nullable|string'
        ]);

        $duesCategory->update($request->all());

        return redirect()->route('dues_categories.index')
                         ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(DuesCategory $duesCategory)
    {
        $duesCategory->delete();
        return redirect()->route('dues_categories.index')
                         ->with('success', 'Kategori berhasil dihapus.');
    }
}
