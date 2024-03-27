<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function generateBlogCode()
    {
        $latestBlog = Blog::latest('slug')->first();

        if (!$latestBlog) {
            return 'BL001';
        }

        $lastNumber = intval(substr($latestBlog->slug, 2));

        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        return 'BL' . $newNumber;
    }

    public function index()
    {
        $res_blog = DB::select('SELECT  b.`id`,b.`title`,b.`slug`,b.`image`,b.`excerpt`,b.`created_at`,pc.`kategori` AS kategori, u.`nama` AS username
        FROM blogs b
        LEFT JOIN post_categories pc ON b.`category_id` = pc.`id`
        LEFT JOIN users u ON b.`user_id` = u.`id`');
        return view('admin.blog.list-blog', compact('res_blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slug = $this->generateBlogCode();
        $res_kategori_post = DB::select('select * from post_categories');
        return view('admin.blog.add-blog', compact('res_kategori_post', 'slug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|image|mimes:png,jpg,jpeg|max:2048',
            'slug' => 'required',
            'title' => 'required',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        $file = $request->file('image');
        $fileName = time()  . '.' . $file->getClientOriginalExtension();
        $folderPath = '/blog-image/' . $request->slug;
        $file->storeAs($folderPath, $fileName);
        // $data['image'] = $fileName;

        Blog::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'body' => $request->body,
            'user_id' => auth()->user()->id,
            'excerpt' => Str::limit(Strip_tags($request->body), 200),
            'image' => $fileName,
        ]);

        return redirect()
            ->route('blog.list')->with("success-add", "Data successfully added.");
        return redirect()
            ->route('blog.list')->with("failed", "Data failed to added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res_find = DB::select('select * from blogs where id=' . $id);
        $find = $res_find[0];
        $res_kategori_post = DB::select('select * from post_categories');
        return view('admin.blog.show-blog', compact('find', 'res_kategori_post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res_find = DB::select('select * from blogs where id=' . $id);
        $find = $res_find[0];
        $res_kategori_post = DB::select('select * from post_categories');
        return view('admin.blog.edit-blog', compact('find', 'res_kategori_post'));
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
        $data = $request->validate([
            'image' => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required',
            'category_id' => 'required',
            'body' => 'required'
        ]);
        $input = $request->id;
        $data = Blog::find($input);
        $data->title = $request->title;
        $data->slug = $request->slug;
        $data->category_id = $request->category_id;
        $data->body = $request->body;
        $data->user_id = auth()->user()->id;
        $data->excerpt = Str::limit(Strip_tags($request->body), 200);
        $data->fill($request->except(['image']));
        $kodeSlug = $data['slug'];
        $folderPathImage = '/blog-image/' . $kodeSlug;

        if ($request->hasFile('image')) {
            $data->image = $this->handleImageUpload($request->file('image'), $folderPathImage, $data->image);
        }
        $data->update();
        if ($data) {
            return redirect()
                ->route('blog.list')->with("success-add", "Data successfully updated.");
        } else {
            return redirect()
                ->route('blog.list')->with("failed", "Data failed to update.");
        }
    }

    private function handleImageUpload($file, $directory, $oldFileName    = null)
    {
        // Hapus file lama jika ada
        if ($oldFileName) {
            Storage::delete("/$directory/$oldFileName");
        }

        // Simpan file baru
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs("/$directory", $fileName);

        return $fileName;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect()->back();
    }
}
