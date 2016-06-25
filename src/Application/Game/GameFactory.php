<?php

namespace Application\Game;

use Ramsey\Uuid\UuidInterface;
use Application\Game\Board;

class GameFactory
{
    public function create(
        UuidInterface $gameId
    )
    {
        return new Game($gameId, new Board());
    }
}
