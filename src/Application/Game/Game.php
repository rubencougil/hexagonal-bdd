<?php

namespace Application\Game;

use Ramsey\Uuid\UuidInterface;

class Game
{
    protected $gameId;
    protected $board;

    public function __construct(
        UuidInterface $id,
        Board $board
    )
    {
        $this->gameId = $id;
        $this->board = $board;
    }

    public function getBoard()
    {
        return $this->board;
    }

    public function getId()
    {
        return $this->gameId;
    }

    public function move($x, $y)
    {
        return true;
    }
}
