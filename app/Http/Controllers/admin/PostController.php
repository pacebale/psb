<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = post::orderBy('id', 'DESC')

        ->get();
    //dd($data);
    return view('admin.post.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
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
            'file' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);

        $fileName = time().'.'.$request->file->extension();

        $request->file->move(public_path('uploads/post'), $fileName);

        $data = array(


            'judul' => $request->get('judul'),
            'konten' => $request->get('konten'),

            'photo' => $fileName);


        post::create($data);
        alert()->success('Data Berhasil Ditambahkan', 'Sukses!!')->autoclose(1100);
        return redirect('admin/post');
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
        $data['data'] = post::find($id);


        return view('admin.post.edit',$data);
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
        if(!empty($request->get('file'))) {

            $request->validate([
                'file' => 'required|mimes:jpg,png,jpeg|max:2048',
            ]);

            $fileName = time().'.'.$request->file->extension();

            $request->file->move(public_path('uploads/post'), $fileName);

            $data = array(


                'judul' => $request->get('judul'),
                'konten' => $request->get('konten'),

                'photo' => $fileName);



            $ubah = post::find($id);
            $ubah->update($data);

        }
        else {




            $data = array(



                'judul' => $request->get('judul'),
                'konten' => $request->get('konten'));




            $ubah = post::find($id);
            $ubah->update($data);
        }
        alert()->success('Data Berhasil Diubah', 'Sukses!!')->autoclose(1100);
        return redirect('admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = post::find($id);
        $hapus->delete();
        alert()->success('Data Berhasil Dihapus', 'Sukses!!')->autoclose(1100);
        return redirect()->back();
    }
}
