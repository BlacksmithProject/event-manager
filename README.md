# BlacksmithProject's Event Manager

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/BlacksmithProject/event-manager/badges/quality-score.png?b=event_registration)](https://scrutinizer-ci.com/g/BlacksmithProject/event-manager/?branch=event_registration)
[![Code Coverage](https://scrutinizer-ci.com/g/BlacksmithProject/event-manager/badges/coverage.png?b=event_registration)](https://scrutinizer-ci.com/g/BlacksmithProject/event-manager/?branch=event_registration)


A PHP Library providing tools to manage Events in Domain Driven Design.

## How to use it

Make your Entity implements `\BSP\EventManager\IRegisterEvent` and use `\BSP\EventManager\EventRegistration`.

Your Entity can now contain its own events.

### Example:
```php
class Entity implements IRegisterEvent
{
	use EventRegistration;

	private $id;
	
	private function __construct(UuidInterface $id)
	{
		$this->id = $id;
	}
	
	public static method Register(UuidInterface $id): self
	{
		$entity = new self($id);
		
		$this->recordedEvents[] = new EntityRegistered($id);
		
		return $entity;
	}
}
```

You now have access to `$entity->recordedEvents()`, and can loop on those, to dispatch them for example.  
Then, you can call `$entity->clearRegisteredEvents()` to clear them off.