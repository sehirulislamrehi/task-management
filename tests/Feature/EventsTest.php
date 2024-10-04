<?php

namespace Tests\Feature;

use App\Enum\ApplicationLogTypeEnum;
use App\Enum\LogEntityEnum;
use App\Enum\LogEventType;
use App\Events\ApplicationLoggingEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use JetBrains\PhpStorm\NoReturn;
use Tests\TestCase;

class EventsTest extends TestCase
{
    /**
     * A basic feature test example with assertions.
     */
    #[NoReturn] public function testApplicationLogEvent(): void
    {
        // Fake the Event facade
        Event::fake();

        $response = [
            "request-status" => false,
            "message" => "Failed with unknown reason"
        ];
        $ticketArray = [1, 2, 4, 5];
        foreach ($ticketArray as $ticket) {
            $event = new ApplicationLoggingEvent(
                ApplicationLogTypeEnum::SUCCESSFUL,
                'web',
                LogEntityEnum::TICKET_DETAIL,
                LogEventType::CREATE,
                "Ticket sent to service software",
                null,
                $ticket,
                serialize($response)
            );
            dd(Event::dispatch($event));

        }


//        // Assert that the ApplicationLoggingEvent was dispatched
//        Event::assertDispatched(ApplicationLoggingEvent::class, function ($event) use ($response, $ticketArray) {
//            return in_array($event->entity_id, $ticketArray) &&
//                $event->log_label === ApplicationLogTypeEnum::SUCCESSFUL->value &&
//                $event->guard === 'web' &&
//                $event->entity_name === LogEntityEnum::TICKET_DETAIL->value &&
//                $event->log_event === LogEventType::CREATE->value &&
//                $event->description === "Ticket sent to service software" &&
//                $event->extra === null &&
//                unserialize($event->data) === $response;
//        });
    }
}
