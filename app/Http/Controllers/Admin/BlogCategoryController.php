<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;

class BlogCategoryController extends Controller
{
    private function generateBlogCategoryCode()
    {
        $latestBlog = PostCategory::latest('slug')->first();

        if (!$latestBlog) {
            return 'PC001';
        }

        $lastNumber = intval(substr($latestBlog->slug, 2));
        $newNumber = $lastNumber + 1;

        return 'PC' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
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
