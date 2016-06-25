<?php

namespace spec\Application\Game;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ramsey\Uuid\UuidInterface;
use Application\Game\Board;

class GameSpec extends ObjectBehavior
{
    function let(UuidInterface $id, Board $board)
    {
        $this->beConstructedWith($id, $board);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Game\Game');
    }

    function it_should_have_an_id(UuidInterface $id)
    {
        $this->getId()->shouldBe($id);
    }

    function it_should_have_a_board(Board $board)
    {
        $this->getBoard()->shouldBe($board);
    }
}
