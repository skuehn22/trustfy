<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Auth;

class AjaxUploadController extends Controller
{
    function index()
    {
        return view('ajax_upload');
    }

    function action(Request $request)
    {

        $user = Auth::user();

        $validation = Validator::make($request->all(), [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if($validation->passes())
        {
            $image = $request->file('select_file');
            $new_name = $user->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/companies/logo'), $new_name);
            return response()->json([
                'message'   => 'Image Upload Successfully',
                'uploaded_image' => '<img src="/uploads/companies/logo/'.$new_name.'" class="img-thumbnail" width="300" />',
                'class_name'  => 'alert-success'
            ]);
        }
        else
        {
            return response()->json([
                'message'   => $validation->errors()->all(),
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        }
    }
}
?>