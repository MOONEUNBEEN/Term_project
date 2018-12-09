<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
         $page = $request->page;
         $msgs = Product::orderBy('created_at', 'desc')->paginate(10);    // 최신순으로 나열
         return view('products.index')->with('msgs', $msgs)->with('page', $page);
         //return __METHOD__;
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('products.write');
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
 
         //$user = User::user();
         //$user = Auth::user();
 /* 
         $title = $request->title;
         $user_id = $user->id();
         $content = $request->content; */
 
         /* DB::insert('insert into boards (title, content, user_id) values (?, ?, ?)', [$result->title, $result->content, $user->id]); */
 
        /* Product::create([
             'name'=>$request->name,
             'price'=>$request->price,
             'content'=>$request->content,
             'user_id'=>$user->id,
        ]); */
        $product = $request->user()->products()->create($request->all());

        if($request->has('attachments')) {
		    foreach($request->attachments as $id) {
		    	$attach = Attachment::find($id);
		    	$attach->product()->associate($product);
		    	$attach->save();
		    }
		}
 
         return redirect(route('products.index', ['page'=>1]));
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show(Request $request, $id)
     {

         
         $page = $request->page;
         $product = Product::where('id',$id->id)->first();
         $product->hits++;
         $product->save();
         return view('products.show')->with('product', $product)->with('page', $page);
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit(Request $reuqest, $id)
     {
         $page = $reuqest->page;
         $product = Product::find($id);
         return view('products.edit')->with('product', $product)->with('page', $page);
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
         $this->validate($request, ['name'=>'required', 'price'=>'required','content'=>'required']);
         // 수정하고자 하는 글이 로그인한 사용자의 글인지 체크, 그렇지 않으면 back(), 그렇다면 다음 소스코드를 따름
         $page = $request->page;
         $product = Product::find($id);
         $product->name = $request->name;
         $product->price = $request->price;
         $product->content = $request->content;
         $product->save();
 
         return redirect(route('products.index', ['page'=>$request->page]));
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
 
         // 삭제하고자 하는 글이 로그인한 사용자의 글인지 체크, 그렇지 않으면 back(), 그렇다면 아래의 코드를 따름
 
         $product = Product::find($id);
         $product->delete();
 
         return redirect(route('products.index'));
     }

}
