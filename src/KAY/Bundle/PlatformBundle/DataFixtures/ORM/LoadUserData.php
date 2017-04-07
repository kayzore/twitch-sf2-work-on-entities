<?php
namespace KAY\Bundle\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KAY\Bundle\PlatformBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $users = array('johndoe', 'dupont', 'janedoe', 'spaceman');
        foreach ($users as $user) {
            $userObj = new User();
            $userObj->setUsername($user);
            $manager->persist($userObj);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}