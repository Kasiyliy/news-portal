<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\System\Content\UserSendEventWebRequest;
use App\Models\Entities\Content\Event;
use App\Models\Entities\Content\EventImage;
use App\Services\Common\V1\Support\FileService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function event($id)
    {
        $event = Event::where('id', $id)->where('is_accepted', true)->with(['images'])->first();
        if (!$event) {
            throw new WebServiceExplainedException('Не найдено!');

        }
        return $this->frontView('pages.events.event', compact('event'));
    }

    public function eventSend()
    {
        return $this->frontView('pages.events.event-send');
    }

    public function eventSendPost(UserSendEventWebRequest $request) {

        try {
            DB::beginTransaction();
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


            $images = [];
            $now = Carbon::now();

            if ($request->has('images')) {
                $files = $request->images;
                foreach ($files as $file) {
                    $images[] = [
                        'image_path' => $this->fileService->store($file, Event::DEFAULT_RESOURCE_DIRECTORY),
                        'event_id' => $event->id,
                        'created_at' => $now,
                        'updated_at' => $now
                    ];
                }
            }

            EventImage::insert($images);
            $this->added();
            DB::commit();
            return redirect()->route('success');
        } catch (\Exception $exception) {
            DB::rollBack();
            if($images) {
                foreach ($images as $image) {
                    $this->fileService->remove($image->image_path);
                }
            }
        }
    }

    public function calendarEvent(Request $request)
    {
        try {
            $events = Event::where('date', '=', $request->date)->where('is_accepted', true)->with(['images'])->get();
            return json_encode(['success' => true, 'events' => $events]);
        } catch (\Exception $exception) {
            return json_encode(['success' => false]);
        }
    }
}
