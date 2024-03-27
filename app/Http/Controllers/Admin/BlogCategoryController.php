<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;

class BlogCategoryController extends Controller
{
    private function generateBlogCategoryCode()
    {
        $latestBlogCategory = PostCategory::latest('slug')->first();

        if (!$latestBlogCategory) {
            return 'PC001';
        }

        $lastNumber = intval(substr($latestBlogCategory->slug, 2));
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        return 'PC' . $newNumber;
    }

    public function index()
    {
        $slug = $this->generateBlogCategoryCode();
        return view('admin.blog.add-blogcategory', compact('slug'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate(
            [
                'kategori' => 'required',
                'slug' => 'required',
            ]
        );

        PostCategory::create($validatedData);

        return redirect()
            ->route('blog.list')->with("success-add", "Data successfully added.");
        return redirect()
            ->route('blog.list')->with("failed", "Data failed to added.");
    }
}
