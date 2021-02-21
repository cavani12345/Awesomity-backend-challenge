<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Http\Resources\ArticleResource;
 use App\Models\API\Article;
 use Validator;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('user_id')){
            $article = Article::where('user_id',$request->user_id)->get();
            return response()->json(ArticleResource::collection($article)); 
        }
        if($request->has('created_at')){
            $article = Article::whereDate('created_at',$request->created_at)->get();
            return response()->json(ArticleResource::collection($article));
        }
        if($request->has('priority')){
            $article = Article::where('priority',$request->priority)->get();
            return response()->json(ArticleResource::collection($article));
        }
        // read all articles
        else{
         $article = Article::all();
         return response()->json(ArticleResource::collection($article)); 
        }
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        // valiadate
        $validator = Validator::make($request->all(), [
            'Title' => 'required',
            'Description' => 'required',
            'Priority' => 'required',
        ]);
        if($validator->fails()){
         return response()->json([
             'ErrorMessage'=> 'Validation Error'. $validator->errors()
         ]);
        }
        else{

        $article = new Article ();

        $article->user_id = auth()->user()->id;
        $article->Title = $request->Title;
        $article->Description = $request->Description;
        $article->Priority = $request->Priority;

        $article->save();
        return response()->json([
            'data'=> new ArticleResource($article),
            'message'=>'Article has been added successfully'
        ]);

        }
        // create new article
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        if($article){
        return response()->json(new ArticleResource($article));
        }
        else{
            return response()->json([
                'message'=> 'No data found'
            ]);
        }
        
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
        $validator = Validator::make($request->all(),[
            'Title'=>'required',
            'Description'=>'required',
            'Priority'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'ErrorMessage'=>'Validation'.$validator->errors()
            ]);   
        }
        else{
            $article = Article::find($id);

            $article->Title = $request->Title;
            $article->Description = $request->Description;
            $article->Priority = $request->Priority;
            $article->save();

            return response()->json([
                'message'=> 'Article '.$article->id.' has successfully updated',
                'update' => new ArticleResource($article)
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return response()->json([
            'message'=> 'Article '. $article->id . ' has successfully deleted'
        ]);
    }
}
