<?php

namespace App\Http\Controllers;


use Auth;
use App\cause;
use App\Http\Resources\CauseResource;
use App\like;
use App\Notifications\NewPost;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class CauseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth',['except' => ['index', 'show']]);



    }

    public function like($id){

        $cause = Cause::findOrFail($id);
        like::create ([
            'cause_id' => $id,
            'user_id' =>Auth::id()
        ]);
        return new CauseResource(Cause::find($id));
    }


    public function unlike($id){

        $cause = Cause::findOrFail($id);

        $like = like::where('cause_id', $id)->where('user_id', Auth::id())->first();

        $like->delete();

        return new CauseResource(Cause::find($id));
    }

    public function Participant($id){

        // $cause = Cause::find($id);
        Participant::create ([
            'cause' => $id,
            'user_id' =>Auth::id()
        ]);
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $causes = Cause::orderBy('created_at', 'desc')->get();
        $causes = CauseResource::collection($causes);
        Artisan::call("db:seed --class=Status");
        return view ('causes.index')->with('causes', $causes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('causes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


            request()->validate([
                'title' => 'required',
                'description' => 'required',
                'location' => 'required',
                'Due_Date' => 'required|date|after_or_equal:today',
                'cause_image' => 'image|nullable|max:1999'

            ]);


                //Handle File upload

                if ($request->hasFile('cause_image')){
                // Get filename with the extension
                $filenameWithExt = $request->file('cause_image')->getClientOriginalName();

                //Get just fileName

                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

                //Get just the extension

                $extension = $request->file('cause_image')->getClientOriginalExtension();

                //Filename to stor

                $fileNameToStore = $filename. '_'.time().'.'.$extension;

                //Upload Image

                $path = $request->file('cause_image')->storeAs('public/cause_images', $fileNameToStore);

                } else {
                    $fileNameToStore = 'noimage.jpg';
                }

            // return back()->with('success', 'new cause added');
            // $this->validate($request, [
            //     'title' => 'required',
            //     'description' => 'required',
            //     'location' => 'required'

            // ]);

            //create Cause
            $cause = new Cause;
            $cause->title = $request->input('title');
            $cause->description = $request->input('description');
            $cause->location = $request->input('location');
            $cause->user_id = auth()->user()->id;
            $cause->Due_Date = $request->input('Due_Date');
            $cause->cause_image = $fileNameToStore;
            $cause->save();

            // $users = User::all();

            // foreach($users as $user) {
            //     $user->notify(new NewPost($cause));
            // }

            return redirect('/causes')->with('success', 'Cause Created');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cause  $cause
     * @return \Illuminate\Http\Response
     */
    public function show(cause $cause)
    {

        return view('causes.show', compact('cause'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cause  $cause
     * @return \Illuminate\Http\Response
     */
    public function edit(cause $cause)
    {
        {
            // $cause = Cause::find($cause);

            //check for correct user

            if(auth()->user()->id !==$cause->user_id){
            return redirect ('/causes')->with('error', 'Unauthorized Page');
            }
            return view('causes.edit', compact ('cause'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cause  $cause
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cause $cause)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'Due_Date' => 'required|date|after_or_equal:today',

        ]);

        //Handle File upload

        if ($request->hasFile('cause_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cause_image')->getClientOriginalName();

            //Get just fileName

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just the extension

            $extension = $request->file('cause_image')->getClientOriginalExtension();

            //Filename to stor

            $fileNameToStore = $filename. '_'.time().'.'.$extension;

            //Upload Image

            $path = $request->file('cause_image')->storeAs('public/cause_images', $fileNameToStore);

            }

        // return back()->with('success', 'new cause added');
        // $this->validate($request, [
        //     'title' => 'required',
        //     'description' => 'required',
        //     'location' => 'required'

        // ]);

        //create Cause
        // $cause = Cause::find($cause);
        $cause->title = $request->input('title');
        $cause->description = $request->input('description');
        $cause->location = $request->input('location');
        $cause->Due_Date = $request->input('Due_Date');

        if ($request->hasFile('cause_image')){

        $cause->cause_image = $fileNameToStore;

        }


        $cause->save();

        return redirect('/causes')->with('success', 'Cause Updated');
        // return redirect('/causes/{cause}')->with('success', 'Cause Updated');
        // return view('causes.show', compact('cause', 'Cause Updated'));




    }

    public function follow($id)
    {
        $cause = Cause::findOrFail($id);
        $cause->users()->attach(Auth::user()->id);
        return new CauseResource(Cause::find($id));
    }

    public function unfollow($id)
    {
        $cause = Cause::findOrFail($id);
        $cause->users()->detach(Auth::user()->id);
        return new CauseResource(Cause::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cause  $cause
     * @return \Illuminate\Http\Response
     */
    public function destroy(cause $cause)
    {

        if(auth()->user()->id !==$cause->user_id){
            return redirect ('/causes')->with('error', 'Unauthorized Page');
            }

            if ($cause->cause_image !== 'noimage.jpg'){

                //Delete Image
                Storage::delete('public/cause_images/'.$cause->cause_image);


            }


         $cause->delete();
        return redirect('/causes')->with('success', 'Cause deleted');
    }



    public function takeout(cause $cause)
    {


         $cause->delete();
        // return back()->with('success', 'Your cause deleted');
        return back()->with('message', 'Your followed Cause deleted.');
    }


}
