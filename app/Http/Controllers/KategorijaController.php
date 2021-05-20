<?php

namespace App\Http\Controllers;

use App\Models\Kategorija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategorijaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $kategorije=Kategorija::all();
        return view ('kategorija.index',['kategorije'=>$kategorije]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategorija.create');
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
            'nazivKategorije'=>'required',
            'opisKategorije'=>'required'
        ]);
        $kategorija = new Kategorija(); // TODO: DODATI CUVANJE SLIKE
        $kategorija->Naziv = $request->nazivKategorije;
        $kategorija->Opis = $request->opisKategorije;
        $kategorija = $kategorija->save();
        return redirect()->route('kategorija.index')->with('success','Kategorija je uspjesno dodata');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategorija  $kategorija
     * @return \Illuminate\Http\Response
     */
    public function show(Kategorija $kategorija)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategorija  $kategorija
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategorija $kategorija)
    {
        return view('kategorija.edit',['kategorija'=>$kategorija]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategorija  $kategorija
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategorija $kategorija)
    {   
        $request->validate([
                'nazivKategorijaEdit' => 'required',
                'opisKategorija' => 'required',
                'slika' => 'nullable|image|max:2048'
        ]);


        if($request->file('slika')){
            $file = $request->file('slika');
            $path = "storage/slike/slike-kategorija/{$file->getClientOriginalName()}";
            $file->storeAs("/public/slike/slike-kategorija", $file->getClientOriginalName());
        }
        $kategorija->update([
            'Naziv'=>$request->nazivKategorijaEdit,
            'Opis'=>$request->opisKategorija, 
            'Ikonica' => $path ?? null
        ]);
            
        return redirect()->route('kategorija.index')->with('success','Kategorija je uspjesno editovana');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategorija  $kategorija
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategorija $kategorija)
    {
        $poruka=Kategorija::where('Id',$kategorija->Id)->dalete();
        if($kategorija){
            return redirect()->route('kategorije.index')->with('success','Kategorija je uspjesno dodata');
        }else{
            return redirect()->route('kategorije.index')->with('fail','Kategorija nije uspjesno dodata');
        }
}
}