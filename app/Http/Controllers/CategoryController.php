<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Setting;
use Excel;
use App\Imports\CategoryImports;
use App\Helpers\Activity;
use Alert;
use Auth;

class CategoryController extends Controller
{
    public function add_category()
    {
        $settingall = Setting::all();
        return view('backend.category.add', compact('settingall'));
    }

    public function save_category(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|min:2|unique:categories',
        ]);
        $user_id = Auth::user()->id;
        $category = new Category;
        $category->fill($request->all());
        \LogActivity::addToLog([
            'data' => 'Menambahkan Category ' . $request->category_name,
            'user' => $user_id,
        ]);
        // 
        $result = $category->save();
        Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        if ($result) {
            alert()->success('Category Berhasil Ditambahkan', 'Berhasil');
            return redirect('/all-category');
        } else {
            alert()->error('Category Gagal Ditambahkan', 'Berhasil');
            return back();
        }
    }

    public function all_category()
    {
        $settingall = Setting::all();
        $category = Category::all();
        return view('backend.category.index', compact('category', 'settingall'));
    }

    public function edit_category($id)
    {
        $settingall = Setting::all();
        $data['category'] = Category::find($id);

        return view('backend.category.edit', $data, compact('settingall'));
    }
    public function update_category(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required|min:2',
        ]);
        $user_id = Auth::user()->id;
        $category = Category::find($id);
        $category->fill($request->all());
        $category->update();
        \LogActivity::addToLog([
            'data' => 'Mengedit Category ' . $request->category_name,
            'user' => $user_id,
        ]);
        alert()->success('Category Berhasil Diupdate', 'Berhasil');
        //return back();
        return redirect('/all-category');
    }

    public function delete_category($id)
    {
        $data = Category::findOrFail($id);
        $category_name = $data->category_name;
        $user_id = Auth::user()->id;
        $category = Category::find($id);
        \LogActivity::addToLog([
            'data' => 'Menghapus Category ' . $category_name,
            'user' => $user_id,
        ]);
        $category->delete();

        alert()->success('Category Berhasil Dihapus', 'Berhasil');
        return back();
    }

    public function excel()
    {
        $settingall = Setting::all();
        return view('backend.category.excel', compact('settingall'));
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'

        ]);
        $user_id = Auth::user()->id;
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            Excel::import(new CategoryImports, $file);
            \LogActivity::addToLog([
                'data' => 'Mengimport Category Dari Excel ',
                'user' => $user_id,
            ]);
            alert()->success('Data Berhasil Diupload', 'Berhasil');
            return redirect('/all-category')->with('success', 'Data Berhasil Diupload');
        }
        return redirect()->back()->with('warning', 'Data gagal Diupload');
    }
}
