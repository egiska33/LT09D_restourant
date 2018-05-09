<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Http\Requests\StoreDishRequest;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('admin.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Dish::class);

        $menus = Menu::all();
        return view ('admin.dish.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
        $this->authorize('create', Dish::class);

        $name = $request->file('photo')->getClientOriginalName();
        Image::make(Input::file('photo'))->resize(300, 200)->save(storage_path('app/public/image/').$name);

//        $request->file('photo')->storeAs('public/image', $request->file('photo')->getClientOriginalName());

        $dish= new Dish();
        $dish->title = $request->title;
        $dish->price = $request->price;
        $dish->description = $request->description;
        $dish->menu_id = $request->menu_id;
        $dish->photo = $name;
        $dish->save();
        return redirect('/admin/dish')->with(['message'=>'Dish add succsses']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $this->authorize('update', Dish::class);
        $menus = Menu::all();
        return view('admin.dish.edit', compact('dish', 'menus'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDishRequest $request, Dish $dish)
    {
        $this->authorize('update', Dish::class);

        if($request->file('photo')){

            if(!empty($dish->photo)){
                Storage::delete('/public/image/'.$dish->photo);
            }
//            $request->file('photo')->storeAs('public/image', $request->file('photo')->getClientOriginalName());
            $name = $request->file('photo')->getClientOriginalName();
            Image::make($request->file('photo'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/image/').$name);
            $dish->photo = $name;

        }
        $dish->title=$request->title;
        $dish->description=$request->description;
        $dish->price = $request->price;
        $dish->menu_id = $request->menu_id;
        $dish->update();

        return redirect()->route('dish.index')->with(['message' => 'Dish updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $this->authorize('delete', Dish::class);

        Storage::delete('/public/image/'.$dish->photo);
        $dish->delete();
        return redirect()->route('dish.index')->with(['message' => 'Dish deleted successfully']);


    }
}
