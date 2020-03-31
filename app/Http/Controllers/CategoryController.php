<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Controllers\sweetAlert;
use Translation;
use Validator;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function getlist()
    {
        $_SESSION["sectionType"] = 'other';

        $tables = Category::orderBy('id', 'asc')->get();
        return View('admin/category/category', compact('tables'));
    }

    public function categoryData()
    {
        $tables = Category::get(['id', 'name','image',  'status',  'created_at']);

        return Datatables::of($tables)
            ->edit_column('status', function ($data) {
                if ($data->status == 1) {
                    $status = config('Convert.active')[0];
                    return '<a style="color: #ca0002" class="active" href="javascript:;">' . $status . '</a>';
                    //return '<a onmouseover="this.style.color=\'#0618d8\" onMouseOut="this.style.color=\'#d80b06\'"> '. $status .'</span>';
                } else {
                    $status = config('Convert.inactive')[0];
                    return '<a class="inactive" href="javascript:;">' . $status . '</a>';
                    //return '<a onmouseover="this.style.color=\'#0618d8\'" onMouseOut="this.style.color=\'#d80b06\'" class="active" href="javascript:;">' . $status . '</a>';
                }
            })
            ->edit_column('image', function ($data) {
                $return_val = 'No Image';
                if($data->image != ''){
                    $url = '/uploads/category/'.$data->image;
                    $return_val = '<img src="'.$url.'" style="width:50px;height:auto;max-height:50px">';
                }
                return $return_val;
            })
            //->add_column('edit', '<a class="edit" href="javascript:;">'.config('Convert.edit')[0].'</a>')
            ->add_column('edit',function($data) {
                $actions = '<button type="button" class="btn btn-default" style="padding:2px 8px;" class="form-control" onclick=\'editCategory('.$data->id.',"'.$data->name.'","'.$data->image.'")\'>Edit</button>';
                
                return $actions;
            })            
            ->add_column('delete', '<a class="delete btn btn-default" style="padding:2px 8px;" href="javascript:;">'.config('Convert.delete')[0].'</a>')
            ->make(true);
    }

    public function updateCategory(Request $request, $id)
    {
        $table = Category::find($id);

        $table->update($request->except('_token'));
        return $table->id;
    }

    public function deleteCategory($id)
    {

        DB::table('findmiin_section')->where('id', $id)->delete();

    }
//  ajax addcategory
//    public function addCategory(Request $request)
//    {
//        $tables = array();
//        if ($request->ajax()) {
//
//            $tables = Category::create($request->except('_token'));
//        }
//        return $tables;
//    }
    public function addCategory(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'photo' => 'image|mimes:jpg,jpeg,bmp,png'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous())->withInput()->withErrors($validator);
        }
        $category_name = $request->get('name');
        $category = DB::table('findmiin_section')->where('name',$category_name)->first();
        if(empty($category)) {
            $safeName = '';
            if ($file = $request->file('photo')) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/uploads/category';
                $destinationPath = base_path() . $folderName;
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
            }
            $new_category = new Category();
            $new_category->name = $category_name;
            if ($safeName != '')
                $new_category->image = $safeName;
            $new_category->save();
            return Redirect::to("admin/category")->with('success', 'New section added successfully.');
        }else{
            return Redirect::to("admin/category")->with('error', 'Section name already exist.');
        }
    }
    public function editCategory(Request $request)
    {
        $rules = array(
            'id'=>'required',
            'name' => 'required',
            'photo' => 'image|mimes:jpg,jpeg,bmp,png'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous())->withInput()->withErrors($validator);
        }
        $category_name = $request->get('name');
        $id = $request->get('id', 0);
        $category = DB::table('findmiin_section')->where('id','<>',$id)->where('name',$category_name)->first();
        if(empty($category)) {
            $safeName = '';
            if ($file = $request->file('photo')) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension() ?: 'png';
                $folderName = '/uploads/category';
                $destinationPath = base_path() . $folderName;
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
            }
            $update_category = Category::find($id);
            $update_category->name =$category_name;
            if($safeName != '')
                $update_category->image = $safeName;
            $update_category->save();
            return Redirect::to("admin/category")->with('success', 'Successfully Updated.');
        }else{
            return Redirect::to("admin/category")->with('error', 'Section name already exist.');
        }
    }

    public function activeCategory($id = 0)
    {
        DB::table('findmiin_section')->where('id', $id)->update(['status'=>0]);
        $data = array("status"=>0);
        return $data;
    }

    public function inactiveCategory($id = 0)
    {
        DB::table('findmiin_section')->where('id', $id)->update(['status'=>1]);
        $data = array("status"=>1);
        return $data;
    }
}

