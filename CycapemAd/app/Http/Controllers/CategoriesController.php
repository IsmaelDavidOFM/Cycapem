<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('category.list', compact('categories'));
    }
    //get
    public function toList(){
        $categories=DB::table('categories')->get();
        //dd($suppliers);
        return view('/categories/list')->with('categories',$categories);
    }

    //get
    public function toCreate(){
        return view('/categories/form');
    }

    //post
    public function toSave(Request $request){
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $category = new Categories();
        $category->type = $request->input('type');
        $category->description = $request->input('description');
        $category->status = $request->input('status');
        $category->save();

        return redirect()->back()->with('success', 'Categoría registrada exitosamente.');
    }

    //get
    public function toEdit($id)
    {
        $category = Categories::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    //Update
    public function toUpdate(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'status' => 'required|string|in:active,inactive',
        ]);

        $category = Categories::findOrFail($id);
        $category->type = $request->input('type');
        $category->description = $request->input('description');
        $category->status = $request->input('status');

        $category->save();

        return redirect()->route('categories.toList')->with('success', 'Categoría actualizada con éxito.');
    }
    //dealate
    public function toDelate($id)
    {
        $supplier = Categories::findOrFail($id);
        $supplier->delete();

        return redirect()->route('categories.toList')->with('success', 'Categoria eliminada exitosamente.');
    }
}
