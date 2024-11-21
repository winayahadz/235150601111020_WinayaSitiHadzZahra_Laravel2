<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function showBlogs()
    {
        $blogs = Blog::all();

        return view('blogs.list', compact('blogs'));
    }

    public function tambahBlog()
    {
        return view('blogs/create');
    }

    public function createBlog(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('blogs', 'public');
        }

        Blog::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'pembuat' => Auth::user()->name,
            'gambar' => $gambarPath,
        ]);

        return redirect("/blogs");
    }

    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);
        if (Auth::user()->name !== $blog->pembuat) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit blog ini.');
        }

        return view('blogs.edit', compact('blog'));
    }

    public function updateBlog(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,JPG|max:20480',
        ]);

        $blog = Blog::findOrFail($id);

        if (Auth::user()->name !== $blog->pembuat) {
            abort(403, 'Anda tidak memiliki akses untuk mengupdate blog ini.');
        }

        $gambarPath = $blog->gambar;
        if ($request->hasFile('gambar')) {
            if ($gambarPath) {
                Storage::disk('public')->delete($gambarPath);
            }
            $gambarPath = $request->file('gambar')->store('blogs', 'public');
        }

        $blog->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $gambarPath,
        ]);

        return redirect('/blogs');
    }

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        if (Auth::user()->name !== $blog->pembuat) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus blog ini.');
        }

        $blog->delete();

        return redirect('/blogs');
    }

    public function detailBlog($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blogs.detail', compact('blog'));
    }
}
