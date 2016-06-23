<?php

namespace spec\Application\Game;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ramsey\Uuid\UuidInterface;

class GameFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Game\GameFactory');
    }

    function it_should_create_a_game(
        UuidInterface $uuid
    )
    {
        $this->create($uuid)->shouldHaveType('Application\Game\Game');
    }
}
