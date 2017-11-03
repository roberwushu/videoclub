<?php

namespace App\Http\Controllers;


use App\Movie;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function getIndex(){

        $movies = Movie::All();
    	return view('catalog.index', array('arrayPeliculas'=>  $movies));
    }


    public function postCreate(Request $request){
       
        $movie = new Movie;
        $movie->title= $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->save();
        return redirect()->action('CatalogController@getEdit', ['id' => $id]);

    }

    public function putEdit(Request $request, $id){

        $movie = Movie::find($id);

        
        $movie->title= $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->save();
        return redirect()->action('CatalogController@getEdit', ['id' => $id]);

    }

    public function getCreate(){
    	return view('catalog.create');
    }

    public function getShow($id){
        $movie = Movie::findOrFail($id);
    	return view('catalog.show', array('dataPelicula'=> $movie, 'id' => $id));
    }

    public function getEdit($id){
        $msg = \Krucas\Notification\Facades\Notification::success('Success message');

     $msg .=   \Krucas\Notification\Facades\Notification::container('myContainer', function($container)
{
    $container->info('Test info message');
    $container->error('Error');
});


 //$msg .= \Krucas\Notification\Facades\Notification::successInstant('Instant success message');

      $movie = Movie::findOrFail($id);
    	return view('catalog.edit', array('pelicula' =>  $movie, 'id'=>$id, 'msg' => $msg));
    }



   
}
