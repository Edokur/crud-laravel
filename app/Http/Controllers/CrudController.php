<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CrudController extends Controller
{

    /* public function index()
    {
        $this->loadlocations();
        return view('map');
    } */
    public function index()
    {
        $query_A = DB::table('family')->where('nama_ayah', 'Budi')->get();
        $query_B = DB::table('family')->where('role', 'son')->get();
        $query_C = DB::table('family')->where('role', 'son')->where('jenis_kelamin', 'Wanita')->get();
        $query_D = DB::table('family')->where('role', 'mother')->where('jenis_kelamin', 'Wanita')->get();
        $query_E = DB::table('family')->where('role', 'son')->where('jenis_kelamin', 'Pria')->get();

        $posts = Family::latest()->get();
        return view('crud', compact('posts'), [
            'query_A' => $query_A,
            'query_B' => $query_B,
            'query_C' => $query_C,
            'query_D' => $query_D,
            'query_E' => $query_E,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'jenis_kelamin' => 'required',
            'nama_ayah' => 'required',
        ]);

        $post = Family::create([
            'name' => $request->name,
            'role' => $request->role,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nama_ayah' => $request->nama_ayah,
        ]);

        if ($post) {
            return redirect()
                ->route('crud')
                ->with([
                    'success' => 'New Data has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
        // return redirect()->back()->with('status', 'Location Added Successfully');
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
        $post = Family::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('crud')
                ->with([
                    'success' => 'Data has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('crud')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
