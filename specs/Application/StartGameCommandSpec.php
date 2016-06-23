<?php

namespace spec\Application;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StartGameCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\StartGameCommand');
    }

    function it_should_have_a_game_id()
    {
        $this->gameId->shouldBeNull();
    }

    function it_should_have_a_player_name()
    {
        $this->playerName->shouldBeNull();
    }
}
