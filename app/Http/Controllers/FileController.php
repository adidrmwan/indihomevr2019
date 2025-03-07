<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\Storage;
use App\TipeGame;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('file.index', [
            'title' => 'File Game',
            'all_files' => File::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TipeGame $allTipe)
    {
        return view ('file.create', [
            'allTipe' => $allTipe->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(File $file)
    {
        $this->validate(request(), [
            'name'          => ['required', 'max:255'],
            'description'   => ['required'],
            'price'         => ['required'],
            'file'          => ['required'],
            'tipe_game'     => ['required'],
            'logo_img'      => ['required'],
            'banner_img'    => ['required'],
            'application_id'=> ['required'],
        ]);
        
        $upload_banner = request()->file('banner_img');
        $name_banner = $upload_banner->getClientOriginalName();

        $upload_logo = request()->file('logo_img');
        $name_logo = $upload_logo->getClientOriginalName();

        $uploaded_file = request()->file('file');
        $filename = $uploaded_file->getClientOriginalName();
        
        $file = File::create([
            'name'          => request()->name,
            'description'   => request()->description, 
            'price'         => request()->price,
            'tipe_game'     => request()->tipe_game,
            'banner_img'    => $name_banner,
            'logo_img'      => $name_logo,
            'file'          => $filename,
            'application_id'=> request()->application_id,
        ]);

        $upload_banner->storeAs('/banner', $name_banner);
        $upload_logo->storeAs('/logo', $name_logo);
        $uploaded_file->storeAs('/', $filename);

        // dd($file);

        return redirect()->route('file.index')->with('success','File berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();

        return redirect()->route('file.index')->with('success','File berhasil dihapus!');
    }

    public function download($id) {
            
            $dl = File::find($id);
            return Storage::download($dl->file, $dl->file);
    }
}
