<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Fake\FakeGameRepository;
use Application\StartGameCommand;
use Application\StartGameHandler;
use Ramsey\Uuid\UuidFactory;
use Application\Game\GameFactory;
use Application\GetGameQuery;
use Application\GetGameHandler;
use Application\Game\GameRepository;
use Application\Game\Board;
use Application\MoveCommand;
use Application\MoveHandler;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{

    const GAME_ID = '7dd6d420-3940-11e6-b765-0002a5d5c51b';

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I have not started a game yet
     */
    public function iHaveNotStartedAGameYet()
    {
        $this->gameRepository = new FakeGameRepository([]);
    }

    /**
     * @When I start a game as player :arg1
     */
    public function iStartAGameAsPlayer($arg1)
    {
        $command = new StartGameCommand();
        $command->gameId = self::GAME_ID;
        $command->playerName = $arg1;

        $handler = new StartGameHandler(
            new FakeGameRepository(),
            new UuidFactory(),
            new GameFactory()
        );

        $handler->handle($command);
    }

    /**
     * @Then I should see an empty board
     */
    public function iShouldSeeAnEmptyBoard()
    {
        $query = new GetGameQuery();
        $query->gameId = self::GAME_ID;

        $handler = new GetGameHandler(
            new FakeGameRepository(),
            new UuidFactory()
        );

        $game = $handler->handle($query);

        PHPUnit_Framework_Assert::assertTrue($game->getBoard()->isEmpty());
    }

    /**
     * @When I make a move
     */
    public function iMakeAMove()
    {
        $command = new MoveCommand();

        $command->gameId = self::GAME_ID;
        $command->x = 10;
        $command->y = 5;

        $handler = new MoveHandler(
            new FakeGameRepository()
        );

        $handler->handle($command);

        PHPUnit_Framework_Assert::assertFalse($game->getBoard()->isEmpty());
    }

    /**
     * @Then I should see a board with one symbol on it
     */
    public function iShouldSeeABoardWithOneSymbolOnIt()
    {
        throw new PendingException();
    }
}
