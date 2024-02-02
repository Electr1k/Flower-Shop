<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use App\Models\Image;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    public function index(){
        $flowers = Flower::orderBy('id', 'asc')->get();
        return view('flower.index', compact('flowers'));
    }
    public function create(){
        return view('flower.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
        ]);
        Flower::create($data);
        return redirect()->route('flower.index');
    }

    public function show(Flower $flower){
        return view('flower.show', compact('flower'));
    }

    public function edit(Flower $flower){
        return view('flower.edit', compact('flower'));
    }
    public function update(Flower $flower){
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
        ]);
        $flower->update($data);
        return redirect()->route('flower.show', $flower->id);
    }

    public function destroy(Flower $flower){
        $flower->delete();
        return redirect()->route('flower.index');
    }
}
