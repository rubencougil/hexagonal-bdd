<?php

namespace Application\Game;

use Ramsey\Uuid\UuidInterface;
use Application\Game\Game;

interface GameRepository
{
    /**
    * @param UuidInterface $id
    * @return Game
    * @throws RuntimeException if game was not found
    */
    public function get(UuidInterface $id);

    /**
    *
    * @param Game
    */
    public function add($game);
}
