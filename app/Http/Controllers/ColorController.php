<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "hello";
        $result['data']=Color::all(); 
        return view ('admin/color',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_color(Request $request,$id='')
    {
        if($id>0)
        {
            $arr=Color::where(['id'=>$id])->get();

            $result['color']=$arr['0']->color;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }
        else{
            $result['color']='';
            $result['status']='';
            $result['id']=0;
        }
        return view ('admin/manage_color',$result);
    }

    public function manage_color_process(Request $request)
    {
       // return $request->post();
        $request->validate([
            'color'=>'required|unique:colors,color,'.$request->post('id'),
       ]);

       
       if($request->post('id')>0){
                $model=Color::find($request->post('id'));
                $msg="Color Updated";
       }else{
                $model=new Color();
                $msg="Color Inserted";
       }
       $model->color=$request->post('color');
       $model->status=1;
       $model->save();

       $request->session()->flash('message',$msg);
       return redirect('admin/color');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $model=Color::find($id);
        $model->delete();

        $request->session()->flash('message','Color deleted');
        return redirect('admin/color');
    }

    public function status(Request $request,$status,$id)
    {
        $model=Color::find($id);
        $model->status=$status;
        $model->save();

        $request->session()->flash('message','Color Status Updated');
        return redirect('admin/color');

        // echo $type;
        // echo $id;
    }
}
