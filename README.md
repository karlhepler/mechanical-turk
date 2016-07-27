Mechanical Turk
================
> The best damn Mechanical Turk Requester API Client ever made...
> or is it? You decide... or don't. Maybe you're indecisive. How would I know?

Contributing
-------------

### Adding Operations
1. Create a new class in `src/OldTimeGuitarGuy/MechanicalTurk/Operations` that extends from `Base\Operation`. The class name **MUST** be the exact name of the operation according to the documentation.
2. Add an entry to the operations array in `src/OldTimeGuitarGuy/MechanicalTurk/Requester.php`. The key must be the camelcase version of the operation name.
3. Add an entry to the documentation array in `src/OldTimeGuitarGuy/MechanicalTurk/Exceptions/MechanicalTurkOperationException.php`. The key must be the exact name of the operation according to the documentation.
4. Create a new (_passing_) test class in `tests/` that extends from `OperationTestCase`. The name of the class **MUST** be the exact name of the operation according to the documentation, followed by _Test_. _(ex. `tests/CreateHITTest.php`)_ Reference the other tests for formatting examples.

> When defining `satisfiesRequirements`, you can use the instance method `isSetOn` to easily determine the requirements.

> **NOTE**: You should **NOT** include _Operation_ as a requirement, as this will be set **automatically** during the request.
