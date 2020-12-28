<?php

namespace App\Http\Controllers\Dashboard;

use App\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     *All section is showing with this function

     **/
    public function sections(){
        $allSections = Section::get();
        return view('backend.layouts.section.sections', compact('allSections'));
    }

    public function addEditSection(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Add Section";
            $section = new Section;
            $message = "Section added successfully !!";
        } else {
            $title = "Edit Section";
            $section = Section::find($id);
            $message = "Section Updated successfully !!";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            //custom validation
            $rules = [
                'section_name' => 'required|regex:/^[\pL\s\-]+$/u',
            ];
            $customMessages = [
                'section_name.required' => 'Section name is required',
                'section_name.regex' => 'Valid name is required',
            ];
            $this->validate($request, $rules, $customMessages);

            $section->section_name = $data['section_name'];
            $section->status = 1;
            $section->save();

            return redirect('admin/section')->with('success', $message);
        }
        return view('backend.layouts.section.add_edit_section', compact('title', 'section'));
    }

    /**
     *It is an ajax request
     *update data if status is 0 it will make 1 or if status is 1 then it will make 0
    **/
    public function updateSectionStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Section::where('id',$data['section_id'])->update(['Status'=>$status]);
            return response()->json(['status'=>$status, 'section_id'=>$data['section_id']]);
        }
    }

    public function deleteSection($id){
        Section::find($id)->delete();
        $message = "Section Deleted Successfully !!";
        return redirect()->back()->with('success', $message);
    }
}
