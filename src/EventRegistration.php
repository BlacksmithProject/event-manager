<?php declare(strict_types=1);

namespace BSP\EventManager;

trait EventRegistration
{
    protected $recordedEvents = [];

    public function registeredEvents(): array
    {
        return $this->recordedEvents;
    }

    public function clearRegisteredEvents(): void
    {
        $this->recordedEvents = [];
    }
}
