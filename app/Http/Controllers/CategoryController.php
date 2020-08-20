<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function create()
    {
        $htmlOption=$this->getCategory($parentId='');
        return view('admin.category.add',compact('htmlOption'));
    }
    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }
    public function store(Request $request)
    {
        $this->category->create([
            'name'=> $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::of($request->name)->slug('-'),
        ]);
        return redirect()->back();
    }
    public function edit($id)
    {
        $categories=$this->category->find($id);
        $htmlOption=$this->getCategory($categories->parent_id);
        return view('admin.category.edit',compact('categories','htmlOption'));
    }
    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->back();
    }
    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name'=> $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::of($request->name)->slug('-'),
        ]);
        return redirect()->route('admin.category.index');

    }
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive -> categoryRecusive($parentId);
        return $htmlOption;
    }
}
