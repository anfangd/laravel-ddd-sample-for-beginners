<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 * 
 */

namespace packages\Techno\Sns\Infrastructure\QueryBuilder\Circle;

use Illuminate\Support\Facades\DB;
use packages\Techno\Sns\Domain\Circle\Circle;
use packages\Techno\Sns\Domain\Circle\CircleId;
use packages\Techno\Sns\Domain\Circle\CircleName;
use packages\Techno\Sns\Domain\Circle\CircleRepositoryInterface;
use packages\Techno\Sns\Domain\User\UserId;

/**
 * UserRepository class
 *
 */
class CircleRepository implements CircleRepositoryInterface
{

    /**
     * Save new Circle.
     *
     * @param Circle $circle
     * @return void
     */
    public function save(Circle $circle)
    {
        DB::table('t_circles')->insert(
            [
                "id" => $circle->getId()->getValue(),
                "name" => $circle->getName()->getValue(),
                "owner_id" => $circle->getOwner()
            ]
        );
        
        return;
    }

    /**
     * Update Circle.
     *
     * @param Circle $circle
     * @return void
     */
    public function update(Circle $circle)
    {
        DB::table('t_circles')->where('id', $circle->getId()->getValue())->update(
            [
                "id" => $circle->getId()->getValue(),
                "name" => $circle->getName()->getValue()
            ]
        );
    }

    /**
     * Find circle by Id.
     *
     * @param CircleId $circle
     * @return void
     */
    public function findById(CircleId $circleId)
    {
        $found = DB::table('t_circles')->where('id', '=', $circleId->getValue())->get();

        if ($found->isEmpty()) {
            return null;
        }

        return new Circle(
            new CircleId($found->get(0)->id),
            new CircleName($found->get(0)->name),
            new UserId($found->get(0)->owner_id),
            $found->get[0]->members
        );
    }

    /**
     * Find user by Name.
     *
     * @param UserName $userName
     * @return void
     */
    public function findByName(CircleName $circleName)
    {
        $found = DB::table('t_circles')->where('name', '=', $circleName->getValue())->get();

        if ($found->isEmpty()) {
            return null;
        }

        return new Circle(
            new CircleId($found->get(0)->id),
            new CircleName($found->get(0)->name),
            new UserId($found->get(0)->owner_id),
            $found->get[0]->members
        );
    }

    /**
     * Delete circle by Name.
     *
     * @param Circle $circle
     * @return void
     */
    public function delete(Circle $circle)
    {
        $found = DB::table('t_circles')->where('name', '=', $circle->getId()->getValue())->delete();

        // var_dump($found);
        // if ($found->isEmpty()) {
        //     return null;
        // }
    }
}
