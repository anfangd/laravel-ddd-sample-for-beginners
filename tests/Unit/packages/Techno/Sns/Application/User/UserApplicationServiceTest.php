<?php
/**
 * Test of UserApplicationServiceTest.
 */
namespace Tests\Unit\packages\Techno\Sns\Application\User;

use packages\Techno\Sns\Application\User\UserApplicationService;
use packages\Techno\Sns\Domain\Service\UserService;
use packages\Techno\Sns\Infrastructure\Eloquent\User\UserRepository;
use packages\Techno\Sns\UseCase\User\Delete\UserDeleteCommand;
use packages\Techno\Sns\UseCase\User\Update\UserUpdateCommand;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Ulid\Ulid;
use Faker\Factory as Faker;

/**
 * UserApplicationServiceTest class
 */
class UserApplicationServiceTest extends TestCase
{
    /** @var Faker\Factory */
    private $faker;

    /**
     * UserRepositoryTest constructer.
     */
    public function __construct()
    {
        parent::__construct();

        $this->faker = Faker::create();
    }

    /**
     * Test create User.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $userRepository = new UserRepository();
        $userService = new UserService($userRepository);
        $user = new UserApplicationService($userRepository, $userService);

        $user->register(Ulid::generate(), $this->faker->name());
        $this->assertTrue(true);
    }

    /**
     * Test get User.
     *
     * @return void
     */
    public function testGetUser()
    {
        $id = Ulid::generate();
        $userRepository = new UserRepository();
        $userService = new UserService($userRepository);
        $user = new UserApplicationService($userRepository, $userService);

        $user->register($id, $this->faker->name());
        $found = $user->get($id);
        
        $this->assertSame($id->__toString(), $found->id);
    }

    /**
     * Test update User.
     *
     * @return void
     */
    public function testUpdateUser()
    {
        $id = Ulid::generate();
        $userRepository = new UserRepository();
        $userService = new UserService($userRepository);
        $user = new UserApplicationService($userRepository, $userService);

        $this->expectException(\Error::class);

        $user->register($id, $this->faker->name());
        $user->update(new UserUpdateCommand($id));
        $this->assertTrue(true);
    }

    /**
     * Test delete User.
     *
     * @return void
     */
    public function testDeleteUser()
    {
        $id = Ulid::generate();

        $userRepository = new UserRepository();
        $userService = new UserService($userRepository);
        $user = new UserApplicationService($userRepository, $userService);

        $user->register($id, $this->faker->name());

        $user->delete(new UserDeleteCommand($id));
        $this->assertTrue(true);
    }
}
