<?php

namespace Application;

use Application\Game\GameRepository;
use Ramsey\Uuid\UuidFactoryInterface;

class GetGameHandler
{
    protected $gameRepository;
    protected $uuidFactory;

    public function __construct(
         GameRepository $gameRepository,
         UuidFactoryInterface $uuidFactory
    )
    {
        $this->gameRepository = $gameRepository;
        $this->uuidFactory = $uuidFactory;
    }

    public function handle(GetGameQuery $query)
    {
        $uuid = $this->uuidFactory->fromString($query->gameId);
        return $this->gameRepository->get($uuid);
    }
}
