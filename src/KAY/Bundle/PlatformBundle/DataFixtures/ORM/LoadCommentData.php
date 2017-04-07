<?php
namespace KAY\Bundle\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KAY\Bundle\PlatformBundle\Entity\Comment;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadCommentData extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $comments = array(array(
            'content'   => 'Nisi excepteur in reprehenderit labore voluptate quis incididunt anim id. Commodo ut dolor 
            ea proident aliquip do proident esse culpa et incididunt ipsum id. In cupidatat enim nulla dolor id 
            mollit ad labore aute veniam. Cillum veniam minim eu id laborum culpa Lorem dolor eiusmod nulla ut esse.',
            'author'    => 1,
            'post'    => 1
        ), array(
            'content'   => 'Ea officia dolore laboris nulla id consectetur voluptate irure. Excepteur proident cupidatat 
            non veniam laborum. Occaecat et Lorem dolor labore excepteur. Occaecat cillum et eiusmod fugiat irure exercitation 
            ipsum aliqua mollit. Dolore aute anim nulla consequat tempor culpa. Id qui incididunt sint esse laboris cillum 
            sunt elit pariatur. Exercitation sint deserunt deserunt aute sit reprehenderit quis minim eiusmod est officia.',
            'author'    => 2,
            'post'    => 2
        ), array(
            'content'   => 'Enim mollit tempor consequat dolor officia aliqua eiusmod occaecat incididunt minim cillum 
            nulla laborum in. Fugiat Lorem labore anim amet fugiat eu. Fugiat aliquip magna pariatur eu elit proident 
            mollit aute fugiat nostrud eu velit exercitation laboris. Incididunt enim excepteur sunt dolore voluptate 
            incididunt id consectetur consectetur amet proident cupidatat. Esse enim quis dolore elit amet aliquip aliqua 
            duis magna sit ex. Qui pariatur dolore proident velit. Ex veniam non culpa et ipsum aliquip ad duis ad.',
            'author'    => 3,
            'post'    => 3
        ), array(
            'content'   => 'Enim mollit tempor consequat dolor officia aliqua eiusmod occaecat incididunt minim cillum 
            nulla laborum in. Fugiat Lorem labore anim amet fugiat eu. Fugiat aliquip magna pariatur eu elit proident 
            mollit aute fugiat nostrud eu velit exercitation laboris. Incididunt enim excepteur sunt dolore voluptate 
            incididunt id consectetur consectetur amet proident cupidatat. Esse enim quis dolore elit amet aliquip aliqua 
            duis magna sit ex. Qui pariatur dolore proident velit. Ex veniam non culpa et ipsum aliquip ad duis ad.',
            'author'    => 1,
            'post'    => 1
        ), array(
            'content'   => 'Enim mollit tempor consequat dolor officia aliqua eiusmod occaecat incididunt minim cillum 
            nulla laborum in. Fugiat Lorem labore anim amet fugiat eu. Fugiat aliquip magna pariatur eu elit proident 
            mollit aute fugiat nostrud eu velit exercitation laboris. Incididunt enim excepteur sunt dolore voluptate 
            incididunt id consectetur consectetur amet proident cupidatat. Esse enim quis dolore elit amet aliquip aliqua 
            duis magna sit ex. Qui pariatur dolore proident velit. Ex veniam non culpa et ipsum aliquip ad duis ad.',
            'author'    => 2,
            'post'    => 1
        ), array(
            'content'   => 'Ea officia dolore laboris nulla id consectetur voluptate irure. Excepteur proident cupidatat 
            non veniam laborum. Occaecat et Lorem dolor labore excepteur. Occaecat cillum et eiusmod fugiat irure exercitation 
            ipsum aliqua mollit. Dolore aute anim nulla consequat tempor culpa. Id qui incididunt sint esse laboris cillum 
            sunt elit pariatur. Exercitation sint deserunt deserunt aute sit reprehenderit quis minim eiusmod est officia.',
            'author'    => 1,
            'post'    => 2
        ), array(
            'content'   => 'Ea officia dolore laboris nulla id consectetur voluptate irure. Excepteur proident cupidatat 
            non veniam laborum. Occaecat et Lorem dolor labore excepteur. Occaecat cillum et eiusmod fugiat irure exercitation 
            ipsum aliqua mollit. Dolore aute anim nulla consequat tempor culpa. Id qui incididunt sint esse laboris cillum 
            sunt elit pariatur. Exercitation sint deserunt deserunt aute sit reprehenderit quis minim eiusmod est officia.',
            'author'    => 3,
            'post'    => 2
        ));
        $em = $this->container->get('doctrine.orm.default_entity_manager');
        foreach ($comments as $comment) {
            $user = $em->getRepository('KAYPlatformBundle:User')->findOneBy(array('id' => $comment['author']));
            $post = $em->getRepository('KAYPlatformBundle:Post')->findOneBy(array('id' => $comment['post']));
            $commentObj = new Comment();
            $commentObj->setContent($comment['content']);
            $commentObj->setPost($post);
            $commentObj->setUser($user);
            $manager->persist($commentObj);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}