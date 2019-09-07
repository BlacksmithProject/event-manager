<?php declare(strict_types=1);

namespace BSP\EventManager\Tests;

use PHPUnit\Framework\TestCase;

final class EventRegistrationTest extends TestCase
{
    public function test it can register events()
    {
        $class = new ClassWithRegisteredEvents();

        $this->assertTrue($class->registeredEvents() === []);

        $class->action();

        $registeredEvents = $this->getRegisteredFakeEvents($class->registeredEvents());

        $this->assertCount(1, $registeredEvents);
    }

    public function test it can clear events()
    {
        $class = new ClassWithRegisteredEvents();

        $class->action();
        $class->clearRegisteredEvents();

        $this->assertCount(0, $class->registeredEvents());
    }

    private function getRegisteredFakeEvents(array $events): array
    {
        return array_filter($events, function ($event) {
            return $event instanceof FakeEvent;
        });
    }
}
