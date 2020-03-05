<?php
/**
 * Test of InMemory User Repository
 */
namespace Tests\Unit\packages\Techno\Sns\Infrastructure\InMemory\User;

use packages\Techno\Sns\Domain\User\User;
use packages\Techno\Sns\Domain\User\UserId;
use packages\Techno\Sns\Domain\User\UserName;
use packages\Techno\Sns\Infrastructure\InMemory\User\InMemoryUserRepository;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Faker\Factory as Faker;
use Ulid\Ulid;

/**
 * InMemoryUserRepositoryTest class
 *
 */
class InMemoryUserRepositoryTest extends TestCase
{
    /** @var Faker\Factory */
    private $faker;

    /**
     * InMemoryUserRepositoryTest constructer.
     */
    public function __construct()
    {
        parent::__construct();

        $this->faker = Faker::create();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testSave()
    {
        $user = new User(
            new UserId(Ulid::generate()),
            new UserName($this->faker->name())
        );
        $repository = new InMemoryUserRepository();
        $repository->save($user);

        $this->assertTrue(true);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testFindById()
    {
        $user = new User(
            new UserId(Ulid::generate()),
            new UserName($this->faker->name())
        );
        $repository = new InMemoryUserRepository();
        $found = $repository->findById($user->getId());
        $this->assertNull($found);

        $repository->save($user);
        $found = $repository->findById($user->getId());

        $this->assertTrue($user->equals($found));

    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testFindByName()
    {
        $user = new User(
            new UserId(Ulid::generate()),
            new UserName($this->faker->name())
        );
        $repository = new InMemoryUserRepository();
        
        $found = $repository->findByName($user->getName());
        $this->assertNull($found);

        $repository->save($user);
        $found = $repository->findByName($user->getName());

        $this->assertTrue($user->equals($found));
    }
}
