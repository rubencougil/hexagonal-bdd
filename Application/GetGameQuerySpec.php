<?php

namespace spec\Application;

use Application\GetGameQuery;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GetGameQuerySpecSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\StartGameQuerySpec');
    }

    function it_should_get_a_game()
    {
        $query = new StartGameQuery();
        $query->gameId = '1234';
        $result = $this->handle($query);
    }
}
