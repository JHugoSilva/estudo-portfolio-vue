<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Image;

class ProjectController extends Controller
{
    public function get_all_project() {
        $projects = Project::orderBy('id', 'DESC')->get();

        return response()->json([
            'projects' => $projects
        ], 200);
    }

    public function add_project(Request $request) {

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;

        if ($request->photo) {
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode("/", $sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path()."/img/upload/";
            $image = $upload_path.$project->photo;
            $img->save($upload_path.$name);
            if (file_exists($image)) {
               @unlink($image);
            } else {
               $name = $project->photo;
            }
        }
        $project->photo = $name;
        $project->save();
    }

    public function get_edit_project($id) {
        $project = Project::find($id);
        return response()->json([
            'project' => $project
        ], 200);
    }

    public function update_project(Request $request, $id) {

        $project = Project::find($id);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;

        if ($project->photo !==  $request->photo) {
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode("/", $sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path()."/img/upload/";
            $image = $upload_path.$project->photo;
            $img->save($upload_path.$name);
            if (file_exists($image)) {
               @unlink($image);
            } else {
               $name = $project->photo;
            }
        }
        $project->photo = $name;
        $project->save();

    }
}
