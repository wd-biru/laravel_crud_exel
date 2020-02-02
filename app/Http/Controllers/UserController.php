<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
class UserController extends Controller
{
    public function index(){
    	$users=User::get()->toArray();
    	// echo "<br>";
    	// print_r($users);
    	// die();
    	return view('welcome',['users'=>$users]);
    }

    public function userdata(Request $request){
       $data=$request->all();

         $this->validate($request, [
              'name' => 'required|string|max:255',
              'lname' => 'required|string|max:255',
              'email' => 'required|email',
              'mobile' => 'required|min:12',
               
          ]);


       if(!empty($data)){
         // \DB::table('users')->insert(['name'=>$data['name'],'lname'=>$data['lname'],'mobile'=>$data['mobile'],'email'=>$data['email'] ]);
        $imgname='';
       	if($request->hasFile('image')){
            $file=$request->file('image');
            $filename=$file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            if( $fileExtension == "jpg" || $fileExtension == "png" || $fileExtension == "jpeg" )
            {
            $imgname = uniqid().$filename;
            $destination = public_path('/uploads/');
            $file->move($destination, $imgname );
        }
        else
		{
			$request->session()->flash('alert-success',"File Extention Wrong");
			return redirect()->back();
		}

       	}

       	$user=new User();
       	$user->name = $data['name'];
       	$user->lname = $data['lname'];
       	$user->mobile = $data['mobile'];
       	$user->email = $data['email'];
       	$user->image = $imgname;

       	$user->save();

          $request->session()->flash('alert-success', 'Data updated successfully!');
         return redirect()->back();
       }
       else{
       	return redirect()->back();
       }

    }

    public function editdata($id){
    	$id = convert_uudecode(base64_decode($id));
    	$editdata = User::where('id',$id)->first()->toArray();
    	return view('editdata',['data'=>$editdata]);
    }

    public function updatedata(Request $request)
    {
    	$data=$request->all();

      if($request->hasFile('image')){

         $oldimage = User::where('id',$data['user_id'])->value('image');
         $fullpath = public_path('uploads/').$oldimage;
         File::delete($fullpath);

            $file=$request->file('image');
            $filename=$file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();

         if( $fileExtension =="jpg" || $fileExtension == "png" ){
            $imgname = uniqid().$filename;
            $destination = public_path('/uploads/');
            $file->move($destination, $imgname );
        }
        else{
          $request->session()->flash('alert-success', 'File Extention Wrong!');
           return redirect()->back();
        }

       	}
       	else{
       	   $imgname = User::where('id',$data['user_id'])->value('image');
       	}


    	User::where('id',$data['user_id'])->update([
                                      'name'=>$data['name'],
                                      'lname' => $data['lname'],
                                      'mobile' => $data['mobile'],
                                      'email' => $data['email'],
                                      'image' => $imgname

    	]);
     $request->session()->flash('alert-success', 'Data updated successfully!');
     return redirect()->to('/');
    }

    public function deletedata(Request $request,$id){
    	$id = convert_uudecode(base64_decode($id));

    	User::where('id',$id)->delete();
    	
    	$request->session()->flash('alert-success', 'Data Deleted successfully!');
    	return redirect()->back();
    }

     public function exportData(){
      // return User::all();
      return Excel::download(new DataExport, 'users.xlsx');
    }
    
}

class DataExport implements FromCollection{
function collection()
{
  return User::all();
}
}
