<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $slider;
    private $category;
    private $product;
    public function __construct(Slider $slider, Category $category, Product $product)
    {
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
    }

    public function index()
    {
        $sliders = $this->slider->get();
        $categories = $this->category->where('parent_id',0)->get();
        $products = $this->product->latest()->get();

        return view('home.index',compact('categories','sliders','products'));
    }
}
