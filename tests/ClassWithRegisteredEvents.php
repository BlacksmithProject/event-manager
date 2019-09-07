<?php declare(strict_types=1);

namespace BSP\EventManager\Tests;

use BSP\EventManager\EventRegistration;
use BSP\EventManager\IRegisterEvents;

final class ClassWithRegisteredEvents implements IRegisterEvents
{
    use EventRegistration;

    public function action(): void
    {
        $this->recordedEvents[] = new FakeEvent();
    }
}
