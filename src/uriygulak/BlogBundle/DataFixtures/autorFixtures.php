<?php
namespace uriygulak\BlogBundle\DataFixtures;

use uriygulak\BlogBundle\Entity\autor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class autorFixtures extends Fixture implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $autor = new autor();
        $autor->setName('Uriy_Fixture');
        $autor->setEmail('uriygulak@gmail.com');
        $autor->setOld('301');

        $manager->persist($autor);

        $manager->flush();
    }
}

