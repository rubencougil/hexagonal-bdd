<?php

namespace Application;

use Application\MoveCommand;
use Application\Game\GameRepository;
use Ramsey\Uuid\Uuid;

class MoveHandler
{
    protected $gameRepository;

    public function __construct(
        GameRepository $gameRepository
    )
    {
        $this->gameRepository = $gameRepository;
    }

    public function handle(MoveCommand $command)
    {
        $game = $this->gameRepository->get(Uuid::uuid1());
        $game->move($command->x, $command->y);
    }
}
