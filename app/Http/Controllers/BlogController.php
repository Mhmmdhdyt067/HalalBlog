<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Models\Log;
use App\Observers\BlogObserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    public function index()
    {

        return view('dashboard.blogs.index', [
            'title' => 'Blog',
            'categories' => Category::all(),
            'blogs' => Blog::where('user_id', Auth::id())->get(),
            'date' => Indo(now()),
        ]);
    }

    public function store(BlogRequest $request)
    {
        $request->validated();

        $blog = Blog::create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category,
            'image' => $request->image->store('images'),
            'slug' => Str::slug($request->title, '-'),
            'excerpt' => Str::words(strip_tags($request->body), 20, '...'),
            'user_id' => auth()->user()->id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'datacreate' => $blog,
        ]);
    }

    public function show(Blog $blog)
    {
        $images = asset('/storage/' . $blog->image);

        return response()->json([
            'success' => true,
            'data' => $blog,
            'image' => $images,
            'message' => 'Berhasil Mengambil Data',
        ]);
    }

    public function edit(Request $request)
    {
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $request->validated();

        if ($request->image) {
            Storage::delete($blog->image);
            $imageupdate = $request->image->store('images');
        } else {
            $imageupdate = $blog->image;
        }

        $blog->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category,
            'image' => $imageupdate,
            'excerpt' => Str::words(strip_tags($request->body), 20, '...'),
            'user_id' => auth()->user()->id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'dataupdate' => $blog,
        ]);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
        ]);
    }

    public function lists()
    {

        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = 'by ' . $author->name;
        }

        return view('pages.blogs.index', [
            'title' => 'All Activity ' . $title,
            'blogs' => Blog::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
        ]);
    }

    public function detail(Blog $blogs)
    {

        return view('pages.blogs.show', [
            'title' => 'Activity',
            'blog' => $blogs,
        ]);
    }

    public function table(Request $request)
    {
        $query = Blog::with('category')->where('user_id', Auth::id());

        if ($request->category) {
            $query = $query->where('category_id', $request->category);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('category.name', function ($data) {
                return $data->category->name;
            })
            ->addColumn('action', function ($data) {
                return '
                    <a href="javascript:void(0)" id="btn-show-blog" data-id=' . $data->id . '
                        class="btn btn-primary btn-sm m-2"><i class="bi bi-info-circle-fill"></i></a>
                    <a href="javascript:void(0)" id="btn-edit-blog" data-id=' . $data->id . '
                        class="btn btn-warning btn-sm m-2"><i class="bi bi-pencil-square"></i></a>
                    <a href="javascript:void(0)" id="btn-delete-blog" data-id=' . $data->id . '
                        class="btn btn-danger btn-sm m-2"><i class="bi bi-trash-fill"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function recycle(Request $request)
    {
        $query = Blog::with('category')->onlyTrashed()->where('user_id', Auth::id());

        if ($request->category) {
            $query = $query->where('category_id', $request->category);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('category.name', function ($data) {
                return $data->category->name;
            })
            ->addColumn('action', function ($data) {
                return '
                    <a href="javascript:void(0)" id="btn-restore-blog" data-id=' . $data->id . '
                        class="btn btn-success btn-sm m-2"><i class="bi bi-repeat"></i></a>
                    <a href="javascript:void(0)" id="btn-destroy-blog" data-id=' . $data->id . '
                        class="btn btn-danger btn-sm m-2"><i class="bi bi-x-circle-fill"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function restore($id)
    {
        $restore = Blog::onlyTrashed()->find($id);
        $restore->restore();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Restore',
        ]);
    }

    public function forceDelete($id)
    {
        $blog = Blog::withTrashed()->find($id);
        Storage::delete($blog->image);
        $blog->forceDelete();

        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
        ]);
    }

    public function log()
    {
        $query = Log::where('user_id', Auth::id());

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('created_at', function ($data) {
                $time = Indo($data->created_at);
                return $time;
            })
            ->make(true);
    }
}
