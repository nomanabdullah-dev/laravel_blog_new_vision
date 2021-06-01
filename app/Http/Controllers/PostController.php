<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $data['post'] = new Post();
        if ($request->post_id) {
            $id = $request->post_id;
            $data['post'] = Post::where('id',$id)->first();
        }
        return view('admin.post.addpost',$data);
    }

    public function show()
    {
        $data['posts'] = Post::paginate(20);
        return view('admin.post.showpost',$data);
    }

    public function store(Request $request)
    {
        $id = '';
        if ($request->post_id) {
            $id = $request->post_id;
        }
        $validator = $this->Validate($request, [
            'title' => 'required',
            'section_title' => 'required'
        ]);
        if(!$validator){
            $success=0;
            return back()->withErrors($validator)->withInput();
        }else{
            $filename = '';
            if ($request->image) {
                $filename = $this->fileUpload($request,'image','');
            }else{
                if ($request->old_image) {
                    $filename = $request->old_image;
                }
            }
            $data = array(
                'page_title' => $request->page_title,
                'section_title' => $request->section_title,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $filename,
            );
            $post = Post::updateOrCreate(['id'=>$id],$data);
            if ($post) {
                if($id)
                return redirect()->route('post-show')->with(['message'=>'Post successfully updated.']);
                else
                return redirect()->route('post-show')->with(['message'=>'Post successfully inserted.']);
            }else{
                return back()->with(['message'=>'Something wrong']);
            }
        }
    }

    public function delete(Request $request)
    {
        $id     = $request->id;
        $img    = $request->image;
        if ($id) {
            if (File::exists(public_path('uploads/'.$img))) {
                File::delete(public_path('uploads/'.$img));

                $res = Post::find($id)->delete();
                if ($res) {
                    echo json_encode('Successfully deleted');
                }else{
                    echo json_encode('Something went wrong');
                }
            }else{
                echo json_encode('File does not exist');
            }
        }else{
            echo json_encode('Post Id Not Found');
        }
    }
}
