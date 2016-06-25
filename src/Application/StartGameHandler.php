<?php

namespace Application;

use Application\Game\GameRepository;
use Application\Game\Game;
use Ramsey\Uuid\UuidFactoryInterface;
use Application\Game\GameFactory;
use Application\Game\Board;

class StartGameHandler
{
    protected $gameRepository;
    protected $uuidFactory;
    protected $gameFactory;
    protected $board;

    public function __construct(
        GameRepository $gameRepository,
        UuidFactoryInterface $uuidFactory,
        GameFactory $gameFactory
    )
    {
        $this->gameRepository = $gameRepository;
        $this->uuidFactory = $uuidFactory;
        $this->gameFactory = $gameFactory;
    }

    public function handle($command)
    {
        $uuid = $this->uuidFactory->fromString($command->gameId);
        $game = $this->gameFactory->create($uuid);
        $this->gameRepository->add($game);
    }
}
