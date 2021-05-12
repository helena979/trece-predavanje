<?php

namespace App\Http\Controllers;

use App\Models\Zanr;
use Illuminate\Http\Request;

class ZanrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zanrovi=Zanr::all();
        return view('zanrovi.index',['zanrovi'=>$zanrovi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zanrovi.create');
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
            'nazivZanr'=>'required'
        ]);
        $zanr=new Zanr();
        $zanr->Naziv=$request->nazivZanr;
        $zanr=$zanr->save();
        if($zanr){
          return redirect()->route('zanrovi.index')->with('success','Zanr je uspješno dodat');
        }else{
          return redirect()->route('zanrovi.index')->with('fail','Zanr nije uspješno dodat'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function show(Zanr $zanr)
    {
        $zanr=Zanr::find($zanr->Id);
        return view('zanrovi.show',["zanr"=>$zanr]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function edit(Zanr $zanr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zanr $zanr)
    {
        $request->validate([
            'nazivZanrEdit'=>'required'
           ]);
           $azurirano=Zanr::where('Id',$zanr->Id)->update([
               'Naziv'=>$request->nazivZanrEdit
           ]);
           if($azurirano){
               return redirect()->route('zanrovi.index')->with('success','Zanr je uspješno azuriran');
             }else{
               return redirect()->route('zanrovi.index')->with('fail','Zanr nije uspješno azuriran'); 
             }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zanr $zanr)
    {
        $izdanje=Zanr::where('Id',$zanr->Id);
        $obrisi=$izdanje->delete();
        if($obrisi){
            return redirect()->route('zanrovi.index')->with('success','Zanr je uspješno obrisan');
          }else{
            return redirect()->route('zanrovi.index')->with('fail','Zanr nije uspješno obrisan'); 
          }
    }
}
