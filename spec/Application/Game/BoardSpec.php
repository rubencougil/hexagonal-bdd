<?php

namespace spec\Application\Game;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BoardSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Game\Board');
    }

    function it_should_start_empty()
    {
        $this->isEmpty()->shouldBe(true);
    }
}
