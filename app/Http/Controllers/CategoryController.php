<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\Category\CategoryRequest;
use App\Policies\CategoryPolicy;

class CategoryController extends Controller
{
    public function __construct()
    {
        return $this->authorizeResource(Category::class, 'category', ['except' => ['index', 'show']]);
    }
   
    public function index(Request $request)
    {
        $categoryQuery = Category::query();

        if($request->has('search'))
        {
            $categoryQuery->where('name', 'like', '%' . $request->search . '%');
        }

        $category = $categoryQuery->paginate($request->per_page);
        
        return response()->json($category);
    }

    
    public function create()
    {
        //
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category;
        
        $category->fill($request->all());
        $category->slug = Str::slug($category->name, '-');

        $category->save();

        return response()->json($category);
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }


    public function edit()
    {
        //
    }

    
    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->slug = Str::slug($request->name, '-');

        $category->save();

        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'message' =>  'Delete success'
        ]);
    }
}
