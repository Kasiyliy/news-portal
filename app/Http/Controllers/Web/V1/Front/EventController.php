<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Content\Event;
use Illuminate\Http\Request;

class EventController extends WebBaseController
{
    public function event($id)
    {
        $event = Event::where('id', $id)->where('is_accepted', true)->with(['images'])->first();
        if (!$event) {
            throw new WebServiceExplainedException('Не найдено!');

        }
        return $this->frontView('pages.event', compact('event'));
    }

    public function eventSend()
    {
        return $this->frontView('pages.event-send');
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
