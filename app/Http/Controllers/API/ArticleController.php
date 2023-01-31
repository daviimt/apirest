<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Articles;
use App\Cicles;
use Validator;

class ArticleController extends Controller { 
    public $successStatus = 200;

    public function index() {
        $articles = Articles::paginate(10);
        $cicles = Cicles::all();
        return view('userViews.articles')->with('articles', $articles)->with('cicles', $cicles);
    }

    public function store(Request $request) {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'cicle_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $articles = Articles::create($input);

        return response()->json(['article' => $articles->toArray()], $this->successStatus);
    }

    public function show($id) {
        $articles = Articles::find($id);

        if (is_null($articles)) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        return response()->json(['article' => $articles->toArray()], $this->successStatus);
    }

    public function update(Request $request, Articles $article) {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'cicle_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $article->title = $input['title'];
        $article->image = $input['image'];
        $article->description = $input['description'];
        $article->cicle_id = $input['cicle_id'];
        $article->save();

        return response()->json(['article' => $article->toArray()], $this->successStatus);
    }

    public function destroy(Articles $article) {
        $article->delete();

        return response()->json(['article' => $article->toArray()], $this->successStatus);
    }
}
