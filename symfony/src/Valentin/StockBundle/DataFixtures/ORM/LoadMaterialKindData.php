<?php

namespace Valentin\StockBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Valentin\StockBundle\Entity\MaterialKind;

class LoadMaterialKindData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $materialKind1 = new MaterialKind();
        $materialKind1->setName('Buttons')->setUnit('unit')->setUnitprice(3);

        $materialKind2 = new MaterialKind();
        $materialKind2->setName('Zip')->setUnit('unit')->setUnitprice(1);

        $materialKind3 = new MaterialKind();
        $materialKind3->setName('Clothes')->setUnit('meter')->setUnitprice(10);


        $manager->persist($materialKind1);
        $manager->persist($materialKind2);
        $manager->persist($materialKind3);
        $manager->flush();
    }
}
