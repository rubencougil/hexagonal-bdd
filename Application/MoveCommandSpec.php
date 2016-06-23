<?php

namespace spec\Application;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MoveCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\MoveCommand');
    }
}
