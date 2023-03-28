<?php

namespace App\Http\Controllers;


use App\Models\intern;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class internController extends Controller
{
    public function index(){

        $interns = intern::orderBy('id','ASC')->paginate(3);

        return view('intern.list',['interns' => $interns]);

       // echo "this is just for tasting";
        return view('intern.list');
    }
    public function create(){
        //echo "this is just for tasting";
        return view('intern.create');
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            //'name'=> 'is_required'
            'name'=> 'required',
            'email'=> 'required',
            'image'=> 'sometimes|image:gif,png,jpeg,jpg'
            
        ]);

        if($validator->passes()){
             $intern = new Intern();
            $intern->name = $request->name;
            $intern->email = $request->email;
            $intern->gender = $request->gender;
            $intern->skill = json_encode($request->interest);
            $intern->save();

            if ($request->image) {

                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/uploads/interns/',$newFileName); // This will save file in a folder
                
                $intern->image = $newFileName;
                $intern->save();
            }

            
            return redirect()->route('interns.index')->with('success','Intern added successfully.');
        }
        else{
            return redirect()->route('interns.create')->withErrors($validator)->withInput();
        }
    }


    public function edit($id){
        $intern = Intern::findOrFail($id);       
        return view('intern.edit',['intern' => $intern, 'skill' => explode(',', $intern->interest)]);
       
    }

    public function update($id, Request $request){

        $validator = Validator::make($request->all(),[
            //'name'=> 'is_required'
            'name'=> 'required',
            'email'=> 'required',
            'image'=> 'sometimes|image:gif,png,jpeg,jpg'
            
        ]);

        if($validator->passes()){
             $intern = Intern::find($id);
            $intern->name = $request->name;
            $intern->email = $request->email;
            $intern->gender = $request->gender;
            $intern->skill = json_encode($request->interest);
            $intern->save();

            if ($request->image) {

                $oldImage = $intern->image;
                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/uploads/interns/',$newFileName); // This will save file in a folder
                
                $intern->image = $newFileName;
                $intern->save();

                File::delete(public_path().'/uploads/interns/'.$oldImage);
            }

            $request->session()->flash('success','intern edited successfully');
            return redirect()->route('interns.index')->with('success','Intern edited successfully.');
        }
        else{
            return redirect()->route('interns.edit',$intern->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy($id, Request $request){
        $intern = Intern::findOrFail($id);  
        File::delete(public_path().'/uploads/interns/'.$intern->image);
        $intern->delete();        
        return redirect()->route('interns.index')->with('success','Intern deleted successfully.');
    }
}
