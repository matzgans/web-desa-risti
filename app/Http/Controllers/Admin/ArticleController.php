<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            # code...
            $articles = Article::where('title', 'like', '%' . $search . '%')->orderBy('title', 'DESC')->paginate(4)->appends(['search' => $search]);
        } else {

            $articles = Article::orderBy('title', 'DESC')->paginate(4); // Ganti 10 dengan jumlah item per halaman yang diinginkan
        }
        return view('pages.admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validasi input lainnya
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|min:10|unique:articles',
            'content' => 'required|string|min:10',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Periksa apakah file thumbnail ada
        if ($request->hasFile('thumbnail')) {
            // Mendapatkan nama asli dari file
            $imageName = $request->file('thumbnail')->getClientOriginalName();

            // Lanjutkan proses penyimpanan file jika valid
            $imagePath = public_path('article/thumb/' . $imageName);

            // Hapus gambar yang ada jika sudah ada
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Pindahkan file thumbnail ke direktori yang diinginkan
            $request->file('thumbnail')->move(public_path('article/thumb'), $imageName);
        }

        // Generate Slug untuk artikel baru
        $slug = Str::slug($request->title . '-' . Str::random(10));

        // Simpan artikel ke dalam database
        Article::create([
            'title' => $request->title,
            'author_id' => Auth::user()->id,
            'content' => $request->content,
            'slug' => $slug,
            'thumbnail' => $imageName,
        ]);

        // Redirect atau respons sesuai kebutuhan
        return redirect()->route('admin.article.index')->with('success', 'Article created successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $article =  Article::where('slug', $slug)->first();
        return view('pages.admin.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        // Validasi input lainnya
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|min:5',
            'content' => 'required|string|min:10',
            'thumbnail' => 'nullable|image|mimes:png|max:2048',
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Perhatikan Inputan anda")->withErrors($validator)->withInput();
        }
        // Periksa apakah file thumbnail ada
        if ($request->hasFile('thumbnail')) {
            // Mendapatkan nama asli dari file
            $imageName = $request->file('thumbnail')->getClientOriginalName();

            // Lanjutkan proses penyimpanan file jika valid
            $imagePath = public_path('article/thumb/' . $imageName);

            // Hapus gambar yang ada jika sudah ada
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Pindahkan file thumbnail ke direktori yang diinginkan
            $request->file('thumbnail')->move(public_path('article/thumb'), $imageName);
            $article->thumbnail = $imageName;
        }

        $article->update([
            'title' => $request->title,
            'author_id' => Auth::user()->id,
            'content' => $request->content,
        ]);

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data penduduk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        // Temukan resident berdasarkan Slug
        $article = Article::where('slug', $slug)->first();

        // Tentukan path gambar
        $photoPath = public_path('article/thumb/' . $article->thumbnail);

        // Cek apakah file gambar ada
        if (file_exists($photoPath)) {
            // Hapus gambar
            unlink($photoPath);
        }

        // Hapus data article dari database
        $article->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    public function update_status(Request $request, String $slug)
    {

        // Validasi request
        // $request->validate([
        //     'is_show' => 'required|boolean',
        // ]);

        if ($request->is_show == null) {

            $data = Article::where('slug', $slug)->first();
            $data->is_show = 0;
            $data->save();
        } else {

            $data = Article::where('slug', $slug)->first();
            $data->is_show = $request->is_show;
            $data->save();
        }


        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Status successfully updated!');
    }
}
