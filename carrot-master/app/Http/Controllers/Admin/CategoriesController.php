<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Category;
use Validator;

class CategoriesController extends Controller
{
  public function getcategory()
  {
    $category = DB::table('vp_categories')->get();
    return view('admin.category', compact('category'));
  }
  public function deletecategory($id){
    DB::table('vp_categories')->where('cate_id',$id)->delete();
    return back();

  }
  public function editcategory($id)
  {
    $category_edit = Category::find($id);
    return view('admin.editcategory', compact('category_edit'));
  }
  public function posteditcategory(Request $request)
  {
    $allRequest  = $request->all();	
    $validator = $this->validator($allRequest);
    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    } else {
      if( $this->updated($allRequest)) {
        // Insert thành công sẽ hiển thị thông báo
        Session::flash('success', 'Sửa thông tin thành công!');
        return redirect('admin.category');
      } else {
        // Insert thất bại sẽ hiển thị thông báo lỗi
        Session::flash('error', 'Sửa thông tin thất bại!');
        return back();
      }
    }
    return redirect()->intended('admin.category');
  }
  protected function validator(array $data)
  {
    return Validator::make(
      $data,
      [
        'name' => 'required|min:2|max:255',
        'id' => 'required|integer',
        'id_ptye' => 'required|integer',
        'parent' => 'required|integer',
      ],
      [
        'required' => ' Tên Danh Mục Sản Phẩm không được để trống',
        'min' =>  'Tên Danh Mục Sản Phẩm phải đủ từ 2-255 ký tự',
        'max' => 'Tên Danh Mục Sản Phẩm phải đủ từ 2-255 ký tự',
        'integer' => 'là chữ số',
      ]
    );
  }
  protected function updated(array $data)
    {
        return Category::updated([
            'cate_id' => $data['id'],
            'id_ptye' => $data['id_ptye'],
            'cate_name' => $data['name'],
            'slug' => $data['slug'],
            'parent' => $data['parent'],
        ]);
    }
}
