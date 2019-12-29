<?php

namespace App\Http\Controllers;
use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $countSuccessfullRow = 0;
        // for($i=0 ;$i < 20;$i++){ // It will create many rows
        //     echo 'home ';
        //     $name = 'category '.($i+1);
        //     $description = 'this description for category number : '.($i+1);
        //     $result = Categories::create(['name'=>$name,'description'=>$description])->get();

        //     if($result != null || $result != []) $countSuccessfullRow++;
        // }
        // return 'The rows that you had added to [categories] table : '.$countSuccessfullRow;


        //this for dyanmic creating rows
        $lastCategory = Categories::orderBy('id','desc')->get();
        if($lastCategory == [] || $lastCategory == null)
            $lastId = 0;
        else $lastId = $lastCategory[0]['id'];
        echo $lastId;
        $name = 'Category '.($lastId+1);
        $description = 'This description for this category number : '.($lastId+1);
        $result = Categories::create(['name'=>$name,'description'=>$description]);
        if($result != null || $result != [])
            return 'Successfull insert new row : '.$result;
        else
            return 'Fail insert !!';
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function showAll(){
        $result = Categories::orderBy('id','asc')->get();
        foreach($result as $row){
            echo 'Row: '.$row.'<br>';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
