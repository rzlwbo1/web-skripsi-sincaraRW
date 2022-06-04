<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Console\Scheduling\EventMutex;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class DashboardEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Ambil data event berdasarkan user id yg sedang login , jadi ga semuaa, kalo mau semua ya Event::all()

        return View::make('dashboard.events.index', [
            "state" => "Dashboard",
            "events" => Event::where('user_id', auth()->user()->id)->latest()->get(),
        ]);

        // return Event::where('user_id', auth()->user()->id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = Category::all();
        return view('dashboard.events.create', [
            "state" => "Buat Post",
            "category" => $category,
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

        // dd($request);

        // *name dan nama file nya, me return path yg di simpen
        return $request->file('image')->store('events-images');
        $validatedData = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'body' => ['required', 'min:5',],
            'priority' => ['required', 'integer', 'min:1', 'max:10'],
            'category_id' => ['required', 'integer', 'min:1'],
            'publish_at' => ['required'],
            'time_at' => ['required'],
        ]);

        // Cek ketika ada judul yg sama, maka slug nya kita bedain

        // ambil semua data Event
        $events = Event::all();

        // cocokin apakah udah ada
        $filteredTitle = $events->where('title', $validatedData['title'])->all();

        // kalo ada, slug nya di bedain
        // kalo ga ya yauda paek yg request title yg baru
        if($filteredTitle != null) {
            $title = collect($filteredTitle)->first()->title;
            $newSlug = Str::of($title)->append(" " . Str::random(5));
            $validatedData['slug'] = Str::slug($newSlug, '-');
        } else {
            $validatedData['slug'] = Str::slug($validatedData['title'], '-');
        }

        // add another field
        $validatedData['user_id'] = Auth::id(); // ambil id yg sedang login
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body'], 100));

        // Store
        Event::create($validatedData);

        return redirect('/dashboard/events')->with('success', "Acara Berhasil di input");

        // dd($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */

    //  ini agak tricky yaa, jadi nama variabel route model binding nya sesuai dengan route nya, disini /dashboad/events >> event , singular dari events, harus sesuai ya
    public function show(Event $event)
    {

        // agar gabisa edit punya org laen
        if($event->user->id !== auth()->user()->id) {
            abort(403);
        }

        return View::make('dashboard.events.detail', [
            "event" => $event,
            "state" => "detail",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {

        // agar gabisa edit punya org laen
        if($event->user->id !== auth()->user()->id) {
            abort(403);
        }

        return View::make('dashboard.events.edit', [
            "state" => "Edit Acara",
            "category" => Category::all(),
            "event" => $event, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

        /**
         * Case nya kalo title di ganti maka cek dlu di db udah ada apa blom
         * kalo udah ada di db maka slugnya di tambahin string acak
         * 
         * Apbila title gak diganti maka slug nya tetep yg awal 
        */

        // Link kalo mau case ganti judul dan ga ganti judul slug nya sama = https://pastebin.com/5XLtiQf3

        // validasi
        $validatedData = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'body' => ['required', 'min:5',],
            'priority' => ['required', 'integer', 'min:1', 'max:10'],
            'category_id' => ['required', 'integer', 'min:1'],
            'publish_at' => ['required'],
            'time_at' => ['required'],
        ]);

        // cek kalo title gak ganti
        if($event->title == $request->title) {

            $currentSlug = $event->slug;
        } else {

            // cek kalo title ganti, pastiin di db udah ada blom
            $queryTitle = Event::where('title', $request->title)->get();

            // ada title yg sama di db
            if(count($queryTitle) != 0) {
                $currentSlug = Str::slug($request->title . " " . Str::random(5), '-');
            } else {
                
                // ga sama dgn di db
                $currentSlug =  Str::slug($request->title, '-');
            }

        }


        // add anoteher field
        $validatedData['slug'] = $currentSlug;
        $validatedData['user_id'] = Auth::id(); // ambil id yg sedang login
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body'], 100));


        Event::where('id', $event->id)
            ->update($validatedData);


        return redirect('/dashboard/events')->with('edited', "Acara berhasil di ubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Event::destroy($event->id);

        return redirect('/dashboard/events')->with('deleted', "Data berhasil dihapus");
    }
}
