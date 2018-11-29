<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon; 
use App\Category;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        
        // $posts = Post::all();

        // $archives= Post::
        $posts = Post::latest()
         ->filter(request(['month', 'year']))
        ->get();


        return view('posts.index', compact('posts', 'archives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
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
        $this->validate(request(),[
            'title'=>'required',
            'body'=>'required',
            'category_id'=>'required',
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body', 'category_id'])));



      
        return redirect('/posts');
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
        //
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
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
        $this->validate(request(),[
            'title'=>'required',
            'body'=>'required',
        ]);
        
        Post::where('id', $id)
        ->update(request(['title', 'body']));
        return redirect('/posts');
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
        Post::where('id', $id)
        ->delete();
        return redirect('/posts');
    }
    // show comments of a post
    public function comments($id)
    {
        //
        $post = Post::find($id);
        return view('posts.comments', compact('post'));
    }

    public function addComment($body)
    {
        //
        $this->comments()->compact($body);
      
    }
    public function archives()
    {
        // $posts = Post::latest()
        // ->filter(request(['month', 'year']))
        // ->get();
        // $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        // ->groupBy('year', 'month')
        // ->orderByRaw('min(created_at) desc')
        // ->get()
        // ->toArray();
        // return view(posts.index, compact('posts', 'archives'));
    }

    // public function showPharmacy($associative Array)
    // {
    //     return static::selectRaw(' 
    //     year(created_at) year,
    //     monthname(created_at) month,
    //     count(*) published')
    //     ->orderByRaw('min(created_at) desc')
    //     ->get();


    // }

    // public function showPharmacy($associativeArray){
    //     $serviceCharge = DB::table('service_charge')
    //     ->select(DB::raw("service_id"))
    //     ->orderByRaw('min(created_at) desc')
    //     ->get();
         
    //     foreach ($serviceCharge as $sc) {
    //     $vc = VisitCharge::select("service_charge_id")->where('id', $sc->id)->get();
    //     foreach ($vc as $v) {
    //         $vc = Visit::select("id")->where('visit_id', $v->visit_id)->get();
    //     $product->category_name = $v->category_name;
    //     foreach ($v as $v1) {
    //     
    //     }    
    //     }
    //     }
    //     return view('products.reports', compact('products'));
    //     }
}

// public function showPharmacy($associativeArray){
//     $serviceCharge = DB::table('service_charge')
//     ->select(DB::raw("patient.fname, visit.date, service_charge_name"))
//     ->where('service_charge_name=pharmarcy')
//     ->orderByRaw('min(visit.date) desc')
//     ->get();
//     $serviceCharge2= json_decode($serviceCharge,TRUE);

//     return $serviceCharge2;
// }
    
    // }
    // public function hackQuantities(){
    //     $visitCharge = DB::table('visit_cahrge')
    //     ->select(DB::raw("quantity"))
    //     ->get();
    //     $visitCharge = json_decode($content,TRUE);
       
       
    //   if{
    //         foreach($visitCharge['quantity'] as $value)
    //         { $new_quantity = $quantity + 9;
    //             //Laravel str_slug function help us to convert the keys so as to match
    //             // with our database table column names and finally we insert our array into the table. 
    //             $insertArr[str_slug($value['id'],'_')] = $value['value'];
    //         }
                   
    //         DB::table('visitCharge')->insert($insertArr);
    //         $insertArr = [];
      
        
    //     }
      
    //  return "https://www.google.com/search?q=emoji&source=lnms&tbm=isch&sa=X&ved=0ahUKEwi9jsab3IreAhVLjywKHSHYB5oQ_AUIDigB&biw=1280&bih=610#imgrc=OwREzYKRzL4w5M:"
    // }

