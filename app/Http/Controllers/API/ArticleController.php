<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Http\Resources\ArticleResource;
 use App\Models\API\Article;
 use Validator;
 use App\Exports\ExportArticles;
 use Maatwebsite\Excel\Facades\Excel;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       /**
     * @OA\Get(
     ** path="/api/articles",
     *   tags={"articles"},
     *   summary="Get List of Articles",
     *   operationId="readArticle",
     *   description="Returns list of articles",
     * 
     *    @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ArticleResource")
     *       ),
     * @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   )
     *   
     *   
     *      
     *  
     *   
     *)
     **/

       // generate all articles
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
     
       
         /**
     * @OA\Post(
     ** path="/api/articles",
     *   tags={"articles"},
     *   summary="creating new article",
     *   operationId="createArticle",
     * @OA\Parameter(
     *      name="Title",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="Description",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="Priority",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * 
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     * ),
     * @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
        
     *)
     **/
         // create new article

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
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
       
         /**
     * @OA\Get(
     ** path="/api/articles/{id}",
     *   tags={"articles"},
     *   summary="Read single article",
     *   operationId="singleArticle",
     * @OA\Parameter(
     *          name="id",
     *          description="Article id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     * 
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\JsonContent(ref="#/components/schemas/ArticleResource"),
     *      
     *    
     *       
     * ),
     * @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   )
     
    
     *  
     *   
     *)
     **/

      // read single id 
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
      
         /**
     * @OA\PUT(
     ** path="/api/articles/{id}",
     *   tags={"articles"},
     *   summary="Update an existing article",
     *   operationId="update article",
     * 
     * @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="Title",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="Description",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="Priority",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * 
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     * ),
     * @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   )
       
     *)
     **/
     // update an existing article
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
            if($article){
                $article->Title = $request->Title;
                $article->Description = $request->Description;
                $article->Priority = $request->Priority;
                $article->save();
    
                return response()->json([
                    'message'=> 'Article '.$article->id.' has successfully updated',
                    'update' => new ArticleResource($article)
                ]);

            }
            else{
                return response()->json([
                    'message'=>'Article you are trying to update doesnot exist in the system'
                ]);
            }

           
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
      /**
     * @OA\Delete(
     *      path="/api/articles/{id}",
     *      operationId="deleteArticles",
     *      tags={"articles"},
     *      summary="Delete existing article",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="article id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     *      
     * )
     */
      // delete an existing article

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return response()->json([
            'message'=>'article'.$article->id.' has successfully been deleted'
        ]);
    }
    // export to csv

       /**
     * @OA\Get(
     ** path="/api/export",
     *   tags={"articles"},
     *   summary="exporting to csv",
     *   operationId="ExportArticles",
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\JsonContent(),
     *      
     *    
     *       
     * ),
     * @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   )
       
     *)
     **/
      // export scv file for all articles
    public function exportArticle(){
        return Excel::download(new ExportArticles, 'articles.xlsx');
    }
    // search an article by its title

     /**
     * @OA\Get(
     ** path="/api/search",
     *   tags={"articles"},
     *   summary="search artcicles by Priority",
     *   operationId="SearchArticles",
     * @OA\Parameter(
     *      name="Priority",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *       @OA\JsonContent(ref="#/components/schemas/ArticleResource"),
     *      
     *    
     *       
     * ),
     * @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   )
     *   
     * 
     *      
     *  
     *   
     *)
     **/
       // search articles by Priority
    public function search(Request $request){
        // where("Priority","LIKE", $request->title.'%')
        $article = Article::where("Priority","LIKE", $request->Priority)->get();
        return response()->json(ArticleResource::collection($article));
    }
}
