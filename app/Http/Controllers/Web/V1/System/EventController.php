<?php

namespace App\Http\Controllers\Web\V1\System;


use App\Core\Utils\FileUtil;
use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\System\Content\EventWebForm;
use App\Http\Requests\Web\V1\System\Content\EventWebRequest;
use App\Http\Requests\Web\V1\System\Content\UserSendEventWebRequest;
use App\Models\Entities\Content\Event;
use App\Models\Entities\Content\EventImage;
use App\Services\Common\V1\Support\FileService;
use Carbon\Carbon;


class EventController extends WebBaseController
{

    protected $fileService;

    /**
     * SliderController constructor.
     * @param $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }


    public function index()
    {
        $event = Event::paginate(10);
        return $this->adminView( 'pages.event.index', compact('event'));
    }

    public function create()
    {
//        $event = Event::with(['images'])->first();
        $event_form = EventWebForm::inputGroups();
        return $this->adminView('pages.event.create', compact('event_form'));
    }

    public function store(EventWebRequest $request)
    {
        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'is_accepted' => true
        ]);

        $image_path = [];
        $now = Carbon::now();

        if ($request->has('image_path')) {
            $files = $request->image_path;
            foreach ($files as $file) {
                $image_path[] = [
                    'image_path' => $this->fileService->store($file, Event::DEFAULT_RESOURCE_DIRECTORY),
                    'event_id' => $event->id,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
        }
        EventImage::insert($image_path);
        $this->added();
        return redirect()->route('event.index');

    }

    public function edit($id)
    {
        $events = Event::with(['images'])->find($id);
        $event_images = EventImage::where('event_id', '=', $id);
        if (!$events) {
            throw new WebServiceExplainedException('Мероприятие не найдено!');
        }
        $event_form = EventWebForm::inputGroups($events);
        return $this->adminView('pages.event.edit', compact('event_images','event_form', 'events'));

    }

    public function update($id, EventWebRequest $request)
    {
        $event = Event::with(['images'])->find($id);
        if(!$event){
            throw new WebServiceExplainedException('Мероприятие не найдено!');

        }

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date
        ]);

        $eventUpdate = [];
        $now = Carbon::now();
        if ($request->has('image_path')) {
            $image_path = $request->image_path;
            foreach ($image_path as $image) {
                $eventUpdate[] = [
                    'image_path' => $this->fileService->store($image, Event::DEFAULT_RESOURCE_DIRECTORY),
                    'event_id' => $id,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
        }
        EventImage::insert($eventUpdate);

        $this->edited();
        return redirect()->back();
    }

    public function delete($id)
    {

        $event = Event::find($id);
        if (!$event) {
            throw new WebServiceExplainedException('Мероприятие не найдено!');
        }

        $this->deleteEventImages($event->id);
        $event->images()->delete();
        $event->delete();
        $this->deleted();
        return redirect()->route('event.index');

    }

    public function accept($id)
    {
        $event = Event::find( $id);
        $event->update(['is_accepted' => true]);

        $this->added();
        return redirect()->route('event.index');

    }


    public function eventSend(UserSendEventWebRequest $request){

        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'representative' => $request->representative,
            'place' => $request->place,
            'fio' => $request->fio,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
        ]);


        $image_path = [];
        $now = Carbon::now();

        if ($request->has('image_path')) {
            $files = $request->image_path;
            foreach ($files as $file) {
                $image_path[] = [
                    'image_path' => $this->fileService->store($file, Event::DEFAULT_RESOURCE_DIRECTORY),
                    'event_id' => $event->id,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
        }
        EventImage::insert($image_path);

        $this->added();

        return $this->frontView('pages.event-send');
    }

    public function deleteEventImages($event_id){
        $contents = EventImage::where('event_id',$event_id)->get();
        foreach ($contents as $content){
            $this->fileService->remove($content->image_path);
        }
    }
}
