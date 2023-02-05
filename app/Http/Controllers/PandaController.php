<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexPandaRequest;
use App\Http\Requests\StorePandaRequest;
use App\Http\Requests\UpdatePandaRequest;
use App\Http\Resources\PandaResource;
use App\Models\Panda;
use Illuminate\Http\Request;

class PandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexPandaRequest $request)
    {
        $data = $request->validated();
        $orderBy = $data["orderBy"] ?? "name";
        $order = $data["order"] ?? "asc";
        if($orderBy == "age") {
            $orderBy = "birth";
            $order = ($order == "asc") ? "desc" : "asc";
        }
        $pandas = Panda::orderBy($orderBy,$order)->get();
        return PandaResource::collection($pandas);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePandaRequest  $request
     * @return \Illuminate\Http\Response
 f    */
    public function store(StorePandaRequest $request)
    {
        $data = $request->validated();
        $new = Panda::create($data);
        return new PandaResource($new);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $panda = Panda::findOrFail($id);
        return new PandaResource($panda);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePandaRequest $request, $id)
    {
        $data = $request->validated();
        $panda = Panda::findOrFail($id);
        if($panda->update($data)) {
            return new PandaResource($panda);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $panda = Panda::findOrFail($id);
        $panda->delete();
    }
}
