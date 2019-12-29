<?php

namespace App\Http\Controllers;
use App\Item;
use App\Categories;
use App\User;
use Illuminate\Http\Request;

class ItemsController extends Controller
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
    public function create($cat_id,$user_id)
    {
        // this is example for learn 
        //will create row dyanmic
        //column :  [name,description,user_id,categories_id] 
        $lastItem = Item::orderBy('id','desc')->get();
        echo $lastItem;
        echo count($lastItem);
        if (count($lastItem)!=0)
            echo 'false';

        if(count($lastItem)!=0){
            $itemId = $lastItem[0]['id'];
        }
        else{
            $itemId = 0;
        }
        
        if(Categories::find($cat_id) == [])
            return 'Fail, There category id is not exist in categories table!!!';

        if(User::find($user_id) == [])
            return 'Fail, There user id is not exist in user table!!!';
        $name = 'Item '.($itemId+1);
        $description= 'This is item description for item number : '.($itemId+1);
        $create = Item::create(['name'=>$name,'description'=>$description,'categories_id'=>$cat_id,'users_id'=>$user_id]);
        echo Item::all()->first()->get();
        if (!empty($create)) {
            return 'Successfull insert : ' . $create;
        } else
            return 'Fail Insert !!';
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
        $result = Item::orderBy('id','asc')->get();
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
