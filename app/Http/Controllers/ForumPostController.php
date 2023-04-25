<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ForumPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = ForumPost::all();

        return view('forum.page', ['forums' => $forums]);
    }

    public function user_post()
    {
        $auth_id = session()->get('auth_id');

        $forums = ForumPost::where('user_id', $auth_id)->get();

        return view('forum.your-post', ['forums' => $forums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('forum.create');
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
            'title'         => 'nullable|sometimes|max:255|min:2',
            'body'          => 'nullable|sometimes|min:2',
            'title_en'      => 'nullable|sometimes|max:255|min:2',
            'body_en'       => 'nullable|sometimes|min:2',
        ]);

        $user_id = session()->get('auth_id');


        if ($request->has('toggle_fr') && !$request->has('toggle_en')) {
            $post = new ForumPost([
                'title'         => $request->input('title'),
                'body'          => $request->input('body'),
                'user_id'       => $user_id,
            ]);
            $post->save();
        }
        if ($request->has('toggle_en') && !$request->has('toggle_fr')) {
            $post = new ForumPost([
                'title_en'  => $request->input('title_en'),
                'body_en'   => $request->input('body_en'),
                'user_id'   => $user_id,
            ]);
            $post->save();
        }
        if ($request->has('toggle_en') && $request->has('toggle_fr')) {
            $post = new ForumPost([
                'title'     => $request->input('title'),
                'body'      => $request->input('body'),
                'title_en'  => $request->input('title_en'),
                'body_en'   => $request->input('body_en'),
                'user_id'   => $user_id,
            ]);
            $post->save();
        }

        return redirect()->back()->with('success', __('lang.text_cree_succes'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function show(ForumPost $forumPost)
    {



        return view('forum.show', ['forumPost' => $forumPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumPost $forumPost)
    {
        $langues = Langue::langueSelect();

        return view('forum.edit', ['forumPost' => $forumPost, 'langues' => $langues]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForumPost $forumPost)
    {
        $request->validate([
            'title'         => 'nullable|sometimes|max:255|min:2',
            'body'          => 'nullable|sometimes|min:2',
            'title_en'      => 'nullable|sometimes|max:255|min:2',
            'body_en'       => 'nullable|sometimes|min:2',
        ]);

        $user_id = session()->get('auth_id');

        if ($forumPost->user_id === $user_id){
            $forumPost->update([
                'title'         => $request->title,
                'body'          => $request->body,
                'title_en'      => $request->title_en,
                'body_en'       => $request->body_en,
            ]);
        }else {
            abort(403, 'Unauthorized action.');
        }
        return redirect(route('forum.your-post'))->withSuccess('Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumPost  $forumPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumPost $forumPost)
    {
        $user_id = session()->get('auth_id');

        if ($forumPost->user_id === $user_id)
        {
        $forumPost->delete();
        }else {
            abort(403, 'Unauthorized action.');
        }
        return redirect(route('forum.your-post'))->withSuccess('Post Deleted');
    }



    public function page()
    {
        $forums = ForumPost::select()
            ->orderBy('created_at', 'desc')
            ->paginate(5);


        return view('forum.page', ['forums' => $forums]);
    }
}
