<?php
namespace uriygulak\BlogBundle\DataFixtures;

use uriygulak\BlogBundle\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class PostFixtures extends Fixture implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $post = new Post();
        $post->setTitle('Подушка для программиста');
        $post->setDescription('Подушка специально для программистов');
        $post->setContent('KONTENT');
        $post->setCreatedAt('d.m.y');
        $post->setUpdateAt('d.m.y');

        $manager->persist($post);

        $manager->flush();
    }
}
