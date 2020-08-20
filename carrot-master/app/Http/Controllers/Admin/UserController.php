<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function getuser(){
        $user = DB::table('users')->get();
        return view('admin.user',compact('user'));
    }
    public function deleteuser($id){
        DB::table('users')->where('id',$id)->delete();
        return back();
    }
    public function edituser($id){
        $user = User::find($id);
        return view('admin.edituser',compact('user'));
    }
    public function postedituser(Request $request){
        $allrequest = $request->all();
        $validator = $this->validator($allrequest);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        else{
            if($this->updated($allrequest)){
                Session::flash('success','Sửa thành công !');
                return redirect('admin/user');
            }
            else{
                Session::flash('error','Sửa không thành công');
                return back();
            }
        }
        return redirect()->intended('admin/user');
    }
    protected function validator(Array $data){
        return Validator::make($data,
            [
                'email' => 'required|min:2|max:255',
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
    protected function updated(Array $data){
        return User::update([
            'id'=> $data['id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level'=> $data['level'],
            'remember_token'=> Hash::make($data['rememeber_token']),
        ]);
    }
}
