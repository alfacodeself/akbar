<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {

            $data = Event::select('id', 'title', 'start', 'end')
                      ->whereDate('start', '>=', $request->start)
                      ->whereDate('end', '<=', $request->end)
                      ->get();

            return response()->json($data);
       }
       return view('app.schedule');
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            switch ($request->type) {
                case 'add':
                    $event = Event::create([
                       'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end,
                    ]);
                    // dd($request->type);
                    return response()->json($event);
                    break;
                case 'update':
                    // dd($request->all());
                    $event = Event::find($request->id)->update([
                       'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end,
                    ]);
                    return response()->json($event);
                    break;

                case 'delete':
                    $event = Event::find($request->id)->delete();
                    return response()->json($event);
                    break;

                default:
                    break;
            }
        }
    }
}
