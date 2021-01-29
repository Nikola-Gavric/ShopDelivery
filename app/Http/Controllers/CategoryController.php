<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Category Management";
        $all_category = Category::paginate(10);
        return view('backend.category.index',compact('page_title','all_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('category.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name' => 'required | max:191|unique:categories',
           'icon' => 'required'
        ]);
        $data = [
            'name'=> $request->name,
            'icon'=> $request->icon
        ];
        Category::create($data);

        return redirect()->back()->withMsg("Category Inserted Successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!filter_var($id,FILTER_VALIDATE_INT)){return;}

        $this->validate($request,[
           'name_edit'=> 'required|max:191',
            'icon_edit' => 'required'
            ]);

        $data = [
            'name'=> $request->name_edit,
            'icon'=> $request->icon_edit
        ];
        Category::where('id',$id)->update($data);

        return redirect()->back()->withMsg("Category Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category = Category::find($id);
        $sub_cat = SubCategory::where('categories_id',$id)->first();
        if(@$sub_cat){
            $cat_id = $sub_cat->categories_id;
        }else{
            $cat_id = "";
        }

       if($id == $cat_id){
           return redirect()->back()->withDelmsg("Can not Delete This Category Contain Sub Category");
        }else{
            Category::find($id)->delete();
            return redirect()->back()->withDelmsg("Category Deleted Successfully");
        }
    }
}
