<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class DashboardInformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Information::where('user_id', Auth::id())->latest()->get();
        return view('dashboard.informations.index', [
            'state' => "information",
            'informations' => $informations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.informations.create', [
            'state' => "Buat Informasi",
            'category' => CategoryInformation::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi inputan
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'image' => 'image|file|max:2048',
            'body' => 'required|min:3',
            'priority' => 'required|integer|min:1',
            'category_information_id' => 'required|integer|min:1',
            'letter' => 'file|mimes:pdf,doc,docx,xls|max:4096'
        ]);

        // dd($validatedData);

        // Cek ketika ada judul yg sama, maka slug nya kita bedain

        // ambil semua data informaton
        $informations = Information::all();

        // cocokin apakah udah ada
        $filteredTitle = $informations->where('title', $validatedData['title'])->all();

        // kalo ada, slug nya di bedain
        // kalo ga ya yauda paek yg request title yg baru
        if($filteredTitle != null) {

            $title = collect($filteredTitle)->first()->title;
            $newSlug = Str::of($title)->append(" " . Str::random(5));
            $validatedData['slug'] = Str::slug($newSlug, '-');

        } else {
            $validatedData['slug'] = Str::slug($validatedData['title'], '-');
        }


        // cek apakah input gambar
        if($request->file('image')) {

            // *name-form dan nama folder nya, me return path (string url) yg di simpen
            $validatedData['image'] = $request->file('image')->store('information-images');
        }


        // cek apakah user input file
        // cek apakah input gambar
        if($request->file('letter')) {

            // *name-form dan nama folder nya, me return path (string url) yg di simpen
            $validatedData['letter'] = $request->file('letter')->store('information-letter');
        }

        // add another field
        $validatedData['user_id'] = Auth::id(); // ambil id yg sedang login
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body'], 100));

        // Store
        Information::create($validatedData);

        return redirect('/dashboard/informations')->with('success', "Informasi Berhasil di input");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        return view('dashboard.informations.detail', [
            'state' => "Detail Information",
            'info' => $information,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        return view('dashboard.informations.edit', [
            'state' => 'Edit Informasi',
            'info' => $information,
            'category' => CategoryInformation::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {

        // validasi
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'image' => 'image|file|max:2048',
            'body' => 'required|min:3',
            'priority' => 'required|integer|min:1',
            'category_information_id' => 'required|integer|min:1',
            'letter' => 'file|mimes:pdf,doc,docx,xls|max:4096'
        ]);


        // cek kalo title gak ganti
        if($information->title == $request->title) {

            $currentSlug = $information->slug;
        } else {

            // cek kalo title ganti, pastiin di db udah ada blom
            $queryTitle = Information::where('title', $request->title)->get();

            // ada title yg sama di db
            if(count($queryTitle) != 0) {
                $currentSlug = Str::slug($request->title . " " . Str::random(5), '-');
            } else {
                
                // ga sama dgn di db
                $currentSlug =  Str::slug($request->title, '-');
            }

        }

        // cek apakah input gambar
        if($request->file('image')) {

            //delete gambar yang lama
            if($information->image) {
                Storage::delete($information->image);
            }

            // *name-form dan nama folder nya, me return path (string url) yg di simpen
            $validatedData['image'] = $request->file('image')->store('information-images');
        }

        // cek apakah input file
        if($request->file('letter')) {

            //delete file yang lama
            if($information->letter) {
                Storage::delete($information->letter);
            }

            $validatedData['letter'] = $request->file('letter')->store('information-letter');

        }

        // add anoteher field
        $validatedData['slug'] = $currentSlug;
        $validatedData['user_id'] = Auth::id(); // ambil id yg sedang login
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body'], 100));

        Information::where('id', $information->id)
                ->update($validatedData);


        return redirect('/dashboard/informations')->with('success', 'Informasi berhasil di ubah');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        // apus image juga
        if($information->image) {
            Storage::delete($information->image);
        }

        if($information->letter) {
            Storage::delete($information->letter);
        }

        Information::destroy($information->id);
    }
}
