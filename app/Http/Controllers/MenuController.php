<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Components\MenuRecusive;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }
    public function index()
    {
        $menus = $this->menu->latest()->paginate(10);
        return view('admin.menu.index', compact('menus'));
    }
    public function create()
    {
        $htmlOption = $this->menuRecusive->menuRecusiveAdd();
        return view('admin.menu.create', compact('htmlOption'));
    }
    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),

        ]);
        return redirect()->back();
    }
    public function edit($id, Request $request)
    {
        $menuEdit = $this->menu->find($id);
        $htmlOption = $this->menuRecusive->menuRecusiveEdit($menuEdit->parent_id);
        return view('admin.menu.edit',compact('htmlOption','menuEdit'));
    }
    public function update($id, Request $request)
    {
        $this->menu->find($id)->update([
            'name'=> $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::of($request->name)->slug('-'),
        ]);
        return redirect()->route('admin.menu.index');
    }
    public function delete($id)
    {
        $this->menu->find($id)->delete();
        return redirect()->back();
    }

}
