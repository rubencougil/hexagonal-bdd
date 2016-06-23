<?php

namespace spec\Application;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Application\StartGameCommand;
use Application\StartGameQuery;
use Application\Game\GameRepository;
use Application\Game\Game;
use Application\Game\GameFactory;
use Ramsey\Uuid\UuidFactoryInterface;
use Ramsey\Uuid\UuidInterface;

class StartGameHandlerSpec extends ObjectBehavior
{
    function let(
        GameRepository $gameRepository,
        UuidFactoryInterface $uuidFactory,
        GameFactory $gameFactory
    )
    {
        $this->beConstructedWith($gameRepository, $uuidFactory, $gameFactory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\StartGameHandler');
    }

    function it_should_start_a_game(
        GameRepository $gameRepository,
        Game $game,
        UuidFactoryInterface $uuidFactory,
        UuidInterface $uuid,
        GameFactory $gameFactory
    )
    {
        $command = new StartGameCommand();
        $command->gameId = '1234';

        $uuidFactory->fromString($command->gameId)->willReturn($uuid);
        $gameFactory->create($uuid)->willReturn($game);

        $this->handle($command);

        $gameRepository->add($game)->shouldHaveBeenCalled();
    }
}
