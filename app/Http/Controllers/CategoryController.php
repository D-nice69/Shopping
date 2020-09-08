<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Product;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    private $category;
    private $product;
    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.category.add', compact('htmlOption'));
    }
    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::of($request->name)->slug('-'),
        ]);
        return redirect()->back();
    }
    public function edit($id)
    {
        $categories = $this->category->find($id);
        $htmlOption = $this->getCategory($categories->parent_id);
        return view('admin.category.edit', compact('categories', 'htmlOption'));
    }
    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->back();
    }
    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::of($request->name)->slug('-'),
        ]);
        return redirect()->route('admin.category.index');
    }
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function productIndex($slug, $id)
    {
        $products = $this->product->where('category_id', $id)->paginate(6);
        $categories = $this->category->where('parent_id', 0)->get();
        $categoriesLimit = $this->category->where('parent_id', 0)->take(3)->get();
        return view('product.category.index', compact('categoriesLimit', 'categories', 'products'));
    }
}
