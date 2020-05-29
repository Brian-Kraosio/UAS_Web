<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bass extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(){

    //Take data from the Mahasiswa Table in Database: 
        $item = \DB::table('item')->get();

    //Send data to view: 
        return view('bassindex',['item' => $item]);
    }

    public function add(){
        $bass_inst_type = ['Double Bass','Electric Bass','Accoustic Bass','Semi-Accoustic'];
        $bass_color = ['Brown','Orange','Natural','Black','White','BlacK Red','Light Blue','Yellow','Mix','Blue','Dark Blue'];
        return view('bassadd',['bass_inst_type' => $bass_inst_type , 'bass_color' => $bass_color]);

    }
    public function simpan(Request $request){

        $this->validate($request,[
            'item_id' => 'required',
            'inst_type' => 'required',
            'item_name' => 'required',
            'color' => 'required',
            'spec' => 'required',
            'price' => 'required|numeric'

        ]);

        \DB::table('item')->insert([
            'item_id' => $request->item_id,
            'inst_type' => $request->inst_type,
            'item_name' => $request->item_name,
            'color' => $request->color,
            'spec' => $request->spec,
            'price' => $request->price
        ]);
        //Take data from the Mahasiswa Table in Database: 
        $item = \DB::table('item')->get();

        //Send data to view: 
        return view('bassindex',['item' => $item]);
    
       

    }

    public function hapus($id){

        $bass = \DB::table('item')->where('item_id',$id)->delete();

        
        $item = \DB::table('item')->get();

        //Send data to view: 
        return view('bassindex',['item' => $item]);
        
    }

    public function detail($id){

        $bass = \DB::table('item')->where('item_id',$id)->get();

        return view('bassdetail', ['bass' => $bass]);

    }

    public function edit($id){
        $bass_inst_type = ['Double Bass','Electric Bass','Accoustic Bass','Semi-Accoustic'];
        $bass_color = ['Brown','Orange','Natural','Black','White','BlacK Red','Light Blue','Yellow','Mix','Blue','Dark Blue'];
        $bass = \DB::table('item')->where('item_id',$id)->get();

        return view('bassedit', ['bass' => $bass, 'bass_inst_type' => $bass_inst_type , 'bass_color' => $bass_color]);

    }
    public function update(Request $request){

        \DB::table('item')->where('item_id',$request->item_id)->update([
            'inst_type' => $request->inst_type,
            'item_name' => $request->item_name,
            'color' => $request->color,
            'spec' => $request->spec,
            'price' => $request->price
        ]);

        //Take data from the Mahasiswa Table in Database: 
        $item = \DB::table('item')->get();

        //Send data to view: 
        return view('bassindex',['item' => $item]);

    }

    public function bass(){
        $search = 'bass';
        $search2 = 'b';
        $item= \DB::table('item')
        ->where('inst_type', 'LIKE', '%'.$search.'%') 
        ->orWhere('item_id', 'LIKE', '%'.$search2.'%') 
        ->get();
        return view('bassindex',['item' => $item]);
    }

    public function guitar(){
        $search = 'Guitar';
        $search2 = 'G';
        $item= \DB::table('item')
        ->where('inst_type', 'LIKE', '%'.$search.'%') 
        ->orWhere('item_id', 'LIKE', '%'.$search2.'%') 
        ->get();
        return view('bassindex',['item' => $item]);
    }
    public function piano(){
        $search = 'violin';
        $search2 = 'P';
        $item= \DB::table('item')
        ->where('inst_type', 'LIKE', '%'.$search.'%') 
        ->orWhere('item_id', 'LIKE', '%'.$search2.'%') 
        ->get();
        return view('bassindex',['item' => $item]);
    }
    public function violin(){
        $search = 'violin';
        $search2 = 'V';
        $item= \DB::table('item')
        ->where('inst_type', 'LIKE', '%'.$search.'%') 
        ->orWhere('item_id', 'LIKE', '%'.$search2.'%') 
        ->get();
        return view('bassindex',['item' => $item]);
    }

    public function search(Request $request){
        $search= $request->get('search');
        $item= \DB::table('item')
        ->where('inst_type', 'LIKE', '%'.$search.'%') 
        ->orWhere('item_name', 'LIKE', '%'.$search.'%') 
        ->get();
        return view('bassindex',['item' => $item]);
    }
}