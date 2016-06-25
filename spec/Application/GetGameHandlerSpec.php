<?php

namespace spec\Application;

use Application\GetGameQuery;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Application\Game\GameRepository;
use Ramsey\Uuid\UuidFactoryInterface;
use Ramsey\Uuid\UuidInterface;
use Application\Game\Game;

class GetGameHandlerSpec extends ObjectBehavior
{
  function let(
      GameRepository $gameRepository,
      UuidFactoryinterface $uuidFactory,
      UuidInterface $gameId,
      Game $game
  )
  {
      $this->beConstructedWith($gameRepository, $uuidFactory);
      $uuidFactory->fromString('1234')->willReturn($gameId);
      $gameRepository->get($gameId)->willReturn($game);
  }

  function it_is_initializable()
  {
      $this->shouldHaveType('Application\GetGameHandler');
  }

  function it_should_have_a_game()
  {
      $query = new GetGameQuery();
      $query->gameId = '1234';
      $result = $this->handle($query);
  }
}
