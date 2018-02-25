<?php
namespace uriygulak\BlogBundle\DataFixtures;

use uriygulak\BlogBundle\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class TagFixtures extends Fixture implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $tag = new Tag();
        $tag->setTitle('TAG');
        $tag->setCreatedAt("d.m.y");
        $tag->setUpdateAt("d.m.y");

        $manager->persist($tag);

        $manager->flush();
    }
}
