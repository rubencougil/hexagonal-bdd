<?php

namespace spec\Application;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Application\Game\GameRepository;
use Application\Game\Game;
use Application\MoveCommand;

class MoveHandlerSpec extends ObjectBehavior
{
    function let(
        GameRepository $gameRepository
    )
    {
        $this->beConstructedWith($gameRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\MoveHandler');
    }

    function it_includes_the_move_in_the_board(
        GameRepository $gameRepository,
        Game $game
    ) {
        $command = new MoveCommand();

        $command->x = 10;
        $command->y = 5;
        $command->gameId = 123;

        $gameRepository->get($command->gameId)->willReturn($game);

        $this->handle($command);

        $game->move($command->x, $command->y)->shouldHaveBeenCalled();
    }
}
