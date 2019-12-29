<?php
use App\Post;
use App\User;
use App\Categories;
use App\Item;
use App\Comment;
use App\Video;
use App\Photo;
use App\Tag;
use App\Taggable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Support\Jsonable;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { // this if first page ..
    return view('welcome');
})->name('home');
Route::group(['middleware'=>'web'],function(){
	Route::resource('posts','PostsController'); //that for use all method [create , show , ....]
});
Route::get('example',array('as'=>'ad.ome',function(){ //here we can get all url from here.
	$url = route('ad.ome');
	//$url = 'not linked!';
	return 'this is url: '.$url;
}));
Route::get('posts','PostsController@index'); //that for connect with controller and use method inside it.

//Any route use id in url, it will execute only when the [id] be numeric that from pattern from RouteServiceProvider.php
Route::get('show_post/{id}','PostsController@show_post'); //For show page from view with parmater by controller
Route::get('contact/{id}','PostsController@show_contact');

Route::get('where/{val}',function($val){
	return 'use where here .. '.$val;
})->where('val','[a-z]*');
Route::get('user/profile',function(){
	return 'use name for named url !' . route('profile');
})->name('profile'); //[name('profile')] => that for name route ,so you can get link like that route('profile')

Route::get('contact',function(){
	$people = ['ahmed','mohammed','saif'];
	return view('contact',compact('people'));
});


//here will use database
//post
Route::get('insert/{title}/{content}',function($title,$content){
    $result = DB::insert('insert into posts(title,body) values(?,?)',[$title,$content]);
    return 'Done!';
});
Route::get('showPosts',function(){
    $result = DB::select('select * from posts');
    return view('post', compact('result'));
});

Route::get('deletePosts/{id}',function($id){
	$result = DB::delete('delete from posts where id=?',[$id]);
	if($result == 0)
		return 'This id not exist in database !! Please make sure and try again!!!';
	return 'Successfull Delete!';
});
//here will getting all images that belongsto post
Route::get('posts/all/photos',function(){
    $images =  Photo::where('image_type','App\Post')->get();
    $count = 1;
    foreach($images as $image){
        echo 'Row ['.$count.']:';
        echo '<br>';
        echo ' '.$image;
        echo '<br>';
        $count++;
    }
});
















/* ============================================================================
*
* 	Eloquent
*
*  ============================================================================*/





//eloquent

Route::get('find/{id}',function($id){
	$post = Posts::find($id);
	return $post;
});

Route::get('findWhere/{id}',function($id){

	$post = Posts::where('id',$id)->orderBy('id','desc')->take(1)->get();
	//you should use get() for convert this object to array
	return $post;
});
Route::get('countPosts',function(){

	$post = Posts::where('id','>=',0)->orderBy('id','desc')->get();
	//you should use get() for convert this object to array
	return $post;
});

Route::get('findOrFail/{id}',function($id){
	$post = Posts::findOrFail($id); //if there no result, it will go to error page..
	//$getFirst = Posts::where('id','<',50)->orderBy('id','desc')->firstOrFail();
	return $post;
});

Route::get('insert',function(){
	$post = new Posts; // that will insert 
	$post = Posts::find(6); //that for update row
	$post->title = 'Title from Eloquent1';
	$post->body = 'That is body from Eloquent1';
	$post->is_admin = 1;
	$post->save();
	return 'Saved!';
});
Route::get('create',function(){
	$post = Posts::create(['title'=>'here we create title','body'=>'then here we can create new body']);
	// just remember here inside create it must be array
	// and the table name it should be defined there inside the model [Posts] 
	// in varaible [fillable] ;
	return $post;
});
Route::get('update',function(){
	$post = Posts::where('id','>',4)->where('is_admin',0)->update(['is_admin'=>1]);
	return 'update successfully : '.$post;
});
//when use softDeletes with model and migrate too, it's update column [deleted_at] to time and this row not deleted from database, so you can return date 
Route::get('delete/{id}',function($id){
	$post = Posts::destroy($id); // delete dirctly
	//$post = Posts::where('id','=',7)->delete(); //another way to delete
	return 'deleted successfully : '.$post;
});
Route::get('softDeletes/{id}',function($id){
	$post = Posts::findOrFail($id)->delete();
	return 'successfull row: '.$post;
});
Route::get('returnDelete',function(){
	$post = Posts::onlyTrashed()->get();
	return 'return deleteing data:<br>'.$post;
});
Route::get('searchWithDeleted',function(){
	$post = Posts::withTrashed()->where('id','>',14)->get();
	return 'searching with deleteing data :<br>'.$post;
});

Route::get('restored/{id}',function($id){
    $result = Posts::onlyTrashed()->where('id',$id)->restore();
    return 'restored rows : '.$result;
});

Route::get('forceDelete/{id}',function($id){
    $result = Posts::withTrashed()->where('id',$id)->forceDelete();
    return 'restored rows : '.$result;
});




/* ============================================================================
*
* 	Eloquent Relationship
*
*  ============================================================================*/



//one to one relationship
Route::get('user/{id}/posts',function($id){
	echo 'body post: '.User::findOrFail($id)->posts->body.'<br>';
	return User::findOrFail(1)->posts;
});
//inverse the last one
Route::get('posts/{id}/user',function($id){
	//echo 'user name: '.Posts::find($id)->user->name.'<br>';
	$posts = new Posts;
	echo $posts->user()->get();
	$post = Posts::where('id',$id)->users;
	return 'post : '.$post;
});

Route::get('users',function(){
	$val = Posts::find('1')->users[0]->name;
	return 'result : '.$val;
});

//Categories 
Route::get('category/create','CategoriesController@create');
Route::get('category/showAll','CategoriesController@showAll');


//items
Route::get('item/create/{cat_id}/{user_id}','ItemsController@create');
Route::get('item/showAll','ItemsController@showAll');
Route::get('test',function(){
        $val = Item::find(1)->Category;
        $val1 = Categories::find($val['id'])->User;
        echo 'User : '.$val1;
        echo 'this is some test you will take about that !!!     ';
	return $val;
});
//comment

Route::get('item/{item_id}/user/{user_id}/comment/create','CommentsController@create');
Route::get('user/{user_id}/comments',function($user_id){
    $result = User::find($user_id)->Comments()->orderBy('items_id','asc')->get();
    $i =1;
    $items_id = 0;
    foreach($result as $row){
        echo '<br>';
        echo 'Row: '.$row;
        if($i != 1 && $row['items_id'] != $items_id){
            $itemName = Item::find($row['items_id'])->name;
            echo '<br><br>Item '.$itemName.': ';
        }
        $i++;
    }
});
//Polymorphic many
Route::get('photo',function(){
//    $val = User::find(1);
//    foreach($val->photo as $l){
//        echo ' Photo : '.$l;
//    }
//    $photo = Photo::find(1);
//    if(!empty($photo)){
//       if($photo->image_type == 'App\User' ) echo '<br>User Name: '.User::find($photo->image_id)->name;
//    }
    
    //when we use method that have morphTo it will return data about foreign key
    $image = Photo::find(1);
    echo $image->image_type.'<br>';
    return $image->image;   
    });
    
   //Polymophic many to many
    Route::get('video/{id}/tags',function($id){
        $video = Video::find($id);
        foreach($video->Tags as $row){
            echo 'Row: '.$row.'<br>';
        }
        $tag = Taggable::find(1);
        echo $tag;
        foreach($tag->taggable as $row){
            echo 'Row : '.$row.'<br>';
        }
    });
    Route::get('video/create/tags',function(){
        //that for make relation and saved to database
        $video = Video::find(2);
        $tag = Tag::find(2);
        $val = $video->Tags()->save($tag);
        echo $val;
//        foreach($val as $v){
//            echo $v.'<br>';
//        }
    });

    

    //Date
    Route::get('date',function(){
        $date = new DateTime();
    	echo $date->format('d-m-Y  || ');
        echo '<br>';
        $carbon = Carbon::now();
        echo $carbon;
        echo '<br>';
        echo $carbon->dayOfYear;
        echo '<br>';
        echo $carbon->englishMonth;
    });
    
    
    //just for test code, it must be in last route
    Route::get('setName',function(){
        $post = User::findOrFail(1);
        $post->name = 'saif hesham badran';
        $post->email = 'saif1997@gmail.com';
        $post->save();
    });
    //here we make scope from the model and just called from here
    Route::get('makeScope',function(){
        return App\Post::getLatest();
    });
    
    
    //show image
Route::get('posts/image/{imageName}',function($imageName){
	return view('posts.image', compact('imageName'));
})->name('post.show.image');
    
    
    //test
    Route::get('justTest',function(){
    	$post = Post::where('id',44)->get();
                //echo $post;
                //$images = Photo::where('image_type','App\Post');
                if(count($post) == 0)
                    return 'This id not exist!!!';
                else
                 return $post[0]->images;
    });
//send email    
Route::get('mail',function(){
    // $mail = [
    //     'title'=>'Test sending email from laravel',
    //     'content'=>'Here you can write some content to display some future ...',
    // ];
    // Mail::send('welcome',$mail,function($message){
    //     $message->to('su.10151222@su.edu.eg','saif')->subject('Welcome from laravel');
    // });

    return 'email';
});
Route::get('sendMail/{id}','OrderController@ship');

Route::resource('user','UserController');
Route::get('user/{id}/{password}','UserController@checkUserPassword');
//for use admin panel
Route::get('admin',function(){
    return view('layout.admin');
});

Route::get('test',function(){
    return view('test');
});