<?php

namespace Valentin\StockBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Valentin\StockBundle\Entity\Season;

class LoadSeasonData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $season1 = new Season();
        $season1->setName('FW15/16');

        $season2 = new Season();
        $season2->setName('SS16');



        $manager->persist($season1);
        $manager->persist($season2);
        $manager->flush();
    }
}