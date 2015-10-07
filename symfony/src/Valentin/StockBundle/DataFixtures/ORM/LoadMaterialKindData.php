<?php

namespace Valentin\StockBundle\DataFixtures\ORM\;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\HelloBundle\Entity\User;
use Valentin\StockBundle\Entity\MaterialKind;

class LoadMaterialKindData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $materialKind1 = new MaterialKind();
        $materialKind1->setName('Buttons')->setUnit('unit');

        $materialKind2 = new MaterialKind();
        $materialKind2->setName('Zip')->setUnit('unit');

        $materialKind3 = new MaterialKind();
        $materialKind3->setName('Clothes')->setUnit('meter');


        $manager->persist($materialKind1);
        $manager->persist($materialKind2);
        $manager->persist($materialKind3);
        $manager->flush();
    }
}
