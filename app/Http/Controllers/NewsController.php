<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\News;
use Auth;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNews = News::paginate(5);
        return view('admin.new.index',compact('listNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
         $new = new News;

         // upload thumbnail
         $allow_type = ["jpg","jpeg","png","svg","png","gif"];
         if($request->hasFile('thumbnail')){
            $thumbnail = $request->thumbnail;
            $file_ext = $thumbnail->getClientOriginalExtension();
            if(in_array($file_ext, $allow_type)){
                $file_name = 'new_'.time().'.'.$file_ext;
                $link_thumbnail = $thumbnail->move("upload",$file_name)->getPathname();
            }
        }
        $new::create(
        [
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'author'=>Auth::user()->name,
            'thumbnail'=>$link_thumbnail
        ]);
        return redirect()->route('admin.new.index');     
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list_new = News::findOrFail($id);
         return view('admin.new.edit',compact('list_new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $new = News::findOrFail($id);
        $allow_type = ["jpg","jpeg","png","svg","png","gif"];
           if($request->hasFile('thumbnail')){
            $thumbnail = $request->thumbnail;
            $file_ext = $thumbnail->getClientOriginalExtension();
            if(in_array($file_ext, $allow_type)){
                $file_name = 'new_'.time().'.'.$file_ext;
                $link_thumbnail = $thumbnail->move("upload",$file_name)->getPathname();
                $new->thumbnail = $link_thumbnail;
                $new->save();
            }
        }
         $new->update($request->only('title','content','description'));
         return redirect()->route('admin.new.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::findOrFail($id);
        $new->delete();
        return redirect()->route('admin.new.index');
    }

    public function search(Request $request){
        $key = trim($request->key);
        if($key != ""){
            $listNews = News::where('title','LIKE','%'.$key.'%')->paginate(5);
            if(count($listNews) > 0){
                return view('admin.new.search',compact('listNews'));    
            }else{
                return redirect()->route('admin.new.index')->with('error',' Không tìm thấy');
            }
        }else{
                return redirect()->route('admin.new.index')->with('error',' Không tìm thấy');
        }  
        
    }
}
