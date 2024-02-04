<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Flower;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    public function index(){
        $flowers = Flower::orderBy('id', 'asc')->get();
        $tag = Tag::find(1);
        dd($tag->flowers);
        return view('flower.index', compact('flowers'));
    }
    public function create(){
        $categories = Category::all();
        return view('flower.create', compact('categories'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
            'category_id' => ''
        ]);
        Flower::create($data);
        return redirect()->route('flower.index');
    }

    public function show(Flower $flower){
        return view('flower.show', compact('flower'));
    }

    public function edit(Flower $flower){
        $categories = Category::all();
        return view('flower.edit', compact('flower', 'categories'));
    }
    public function update(Flower $flower){
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
            'category_id' => ''
        ]);
        $flower->update($data);
        return redirect()->route('flower.show', $flower->id);
    }

    public function destroy(Flower $flower){
        $flower->delete();
        return redirect()->route('flower.index');
    }
}
