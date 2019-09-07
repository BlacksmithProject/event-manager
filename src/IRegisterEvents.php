<?php declare(strict_types=1);

namespace BSP\EventManager;

interface IRegisterEvents
{
    public function registeredEvents(): array;

    public function clearRegisteredEvents(): void;
}
