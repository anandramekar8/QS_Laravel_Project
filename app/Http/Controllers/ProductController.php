<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "hello";
        $result['data']=Product::all(); 
        return view ('admin/product',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_product(Request $request,$id='')
    {
        if($id>0)
        {
            $arr=Product::where(['id'=>$id])->get();

            $result['category_id']=$arr['0']->category_id;
            $result['name']=$arr['0']->name;
            $result['image']=$arr['0']->image;
            $result['slug']=$arr['0']->slug;
            $result['brand']=$arr['0']->brand;
            $result['model']=$arr['0']->model;
            $result['short_desc']=$arr['0']->short_desc;
            $result['desc']=$arr['0']->desc;
            $result['keywords']=$arr['0']->keywords;
            $result['technical_specification']=$arr['0']->technical_specification;
            $result['uses']=$arr['0']->uses;
            $result['warranty']=$arr['0']->warranty;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }
        else{
            $result['category_id']='';
            $result['name']='';
            $result['image']='';
            $result['slug']='';
            $result['brand']='';
            $result['model']='';
            $result['short_desc']='';
            $result['desc']='';
            $result['keywords']='';
            $result['technical_specification']='';
            $result['uses']='';
            $result['warranty']='';
            $result['status']='';
            $result['id']=0;
        }

        $result['category']=DB::table('categories')->where(['status'=>1])->get();
        // echo '<pre>';
        // print_r($result['category']);
        // die();
        return view ('admin/manage_product',$result);
    }

    public function manage_product_process(Request $request)
    {
       // return $request->post();
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:products,slug,'.$request->post('id'),
       ]);

       
       if($request->post('id')>0){
                $model=Product::find($request->post('id'));
                $msg="Product Updated";
       }else{
                $model=new Product();
                $msg="Product Inserted";
       }

       $model->category_id=$request->post('category_id');
       $model->name=$request->post('name');
       $model->slug=$request->post('slug');
       $model->brand=$request->post('brand');
       $model->model=$request->post('model');
       $model->short_desc=$request->post('short_desc');
       $model->desc=$request->post('desc');
       $model->keywords=$request->post('keywords');
       $model->technical_specification=$request->post('technical_specification');
       $model->uses=$request->post('uses');
       $model->warranty=$request->post('warranty');
       $model->status=1;
       $model->save();

       $request->session()->flash('message',$msg);
       return redirect('admin/product');
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
        $model=Product::find($id);
        $model->delete();

        $request->session()->flash('message','product deleted');
        return redirect('admin/product');
    }

    public function status(Request $request,$status,$id)
    {
        $model=Product::find($id);
        $model->status=$status;
        $model->save();

        $request->session()->flash('message','Product Status Updated');
        return redirect('admin/product');

        // echo $type;
        // echo $id;
    }
}
