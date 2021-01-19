<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DirectoryController extends Controller
{


    public function getDir($name){
        $folders = glob( $name."\*",0);
        return view('users.Dir.view',compact(['folders','name']) );
    }

    public function upload(Request $request ,$name){
        if($files =$request->file('file')){
            foreach ($files as $file){
                $file->move($name,$file->getClientOriginalName());
            }
        }
        return redirect(route('openDir',$name));
    }

    public function download($path){
        $file_path= public_path().'\\'.$path;
        $headers = array(
            'Content-Type: application/pdf',
        );
        $temp = explode('\\',$path);
        return Response::download($file_path,end($temp) , $headers);
    }

   public function dirToArray($dir) {
        $result = array();

        $cdir = scandir($dir);
        foreach ($cdir as $key => $value)
        {
            if (!in_array($value,array(".","..")))
            {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
                {
                    $result[$value] = $this->dirToArray($dir . DIRECTORY_SEPARATOR . $value);
                }
                else
                {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }
}
