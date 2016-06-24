<?php

namespace Fake;

use Application\Game\GameRepository;
use Ramsey\Uuid\UuidInterface;
use Application\Game\Game;
use Application\Game\Board;
use Ramsey\Uuid\Uuid;

class FakeGameRepository implements GameRepository
{
    protected $games;

    public function __construct()
    {
        $this->games = array();
    }

  /**
    * @param UuidInterface $id
    * @return Game
    * @throws RuntimeException if game was not found
    */
    public function get(UuidInterface $id)
    {
        /*if ( isset($this->games[$id->toString()]) ) {

            return $this->games[$id->toString()];

        } else {

            throw new \RuntimeException("Game not found");

        }*/

        return new Game(Uuid::uuid1(), new Board);
    }

    /**
    *
    * @param Game
    */
    public function add($game)
    {
        $this->games[$game->getId()->toString()] = $game;
    }
}
