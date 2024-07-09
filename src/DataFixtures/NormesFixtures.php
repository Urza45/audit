<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use App\Entity\Normes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use PhpParser\Node\Expr\New_;

class NormesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Norme R482
        $norme = New Normes();
        $norme->setShortName('R482')
            ->setLongName('Engins de chantier')
            ->setUpdateYear(10);
        
        $manager->persist($norme);

        $categorie = New Categories();
        $categorie->setIdNormes($norme)
            ->setName('A')
            ->setText('Engins compacts');

        $manager->persist($categorie);

        $categorie = New Categories();
        $categorie->setIdNormes($norme)
            ->setName('B1')
            ->setText('Engins d’extraction à déplacement séquentiel');

        $manager->persist($categorie);

        $categorie = New Categories();
        $categorie->setIdNormes($norme)
            ->setName('B2')
            ->setText('Engins de forage à déplacement séquentiel');

        $manager->persist($categorie);

        $categorie = New Categories();
        $categorie->setIdNormes($norme)
            ->setName('B3')
            ->setText('Engins rail-route à déplacement séquentiel');

        $manager->persist($categorie);

        $categorie = New Categories();
        $categorie->setIdNormes($norme)
            ->setName('C1')
            ->setText('Engins de chargement à déplacement alternatif');

        $manager->persist($categorie);

        $categorie = New Categories();
        $categorie->setIdNormes($norme)
            ->setName('C2')
            ->setText('Engins de réglage à déplacement alternatif');

        $manager->persist($categorie);

        $categorie = New Categories();
        $categorie->setIdNormes($norme)
            ->setName('C3')
            ->setText('Engins de nivellement à déplacement alternatif');

        $manager->persist($categorie);

        $categorie = New Categories();
        $categorie->setIdNormes($norme)
            ->setName('D')
            ->setText('Engins de compactage');

        $manager->persist($categorie);

        $categorie = New Categories();
        $categorie->setIdNormes($norme)
            ->setName('E')
            ->setText('Engins de transport');

        $manager->persist($categorie);

        $categorie = New Categories();
        $categorie->setIdNormes($norme)
            ->setName('F')
            ->setText('Chariots de manutention tout-terrain');

        $manager->persist($categorie);

        $categorie = New Categories();
        $categorie->setIdNormes($norme)
            ->setName('G')
            ->setText('Conduite des engins hors production');

        $manager->persist($categorie);

        // Norme R483
        $norme = New Normes();
        $norme->setShortName('R483')
            ->setLongName('Grues mobiles')
            ->setUpdateYear(5);
        
        $manager->persist($norme);

        // Norme R484
        $norme = New Normes();
        $norme->setShortName('R484')
            ->setLongName('Ponts roulants et portiques')
            ->setUpdateYear(5);
        
        $manager->persist($norme);

        // Norme R485
        $norme = New Normes();
        $norme->setShortName('R485')
            ->setLongName('Chariots de manutention automoteurs gerbeurs à conducteur accompagnant')
            ->setUpdateYear(5);
        
        $manager->persist($norme);

        // Norme R486
        $norme = New Normes();
        $norme->setShortName('R486')
            ->setLongName('Plates-formes élévatrices mobiles de personnel')
            ->setUpdateYear(5);
        
        $manager->persist($norme);

        // Norme R487
        $norme = New Normes();
        $norme->setShortName('R487')
            ->setLongName('Grues à tour')
            ->setUpdateYear(5);
        
        $manager->persist($norme);

        // Norme R489
        $norme = New Normes();
        $norme->setShortName('R489')
            ->setLongName('Chariots de manutention automoteurs à conducteur porté')
            ->setUpdateYear(5);
        
        $manager->persist($norme);

        // Norme R490
        $norme = New Normes();
        $norme->setShortName('R490')
            ->setLongName('Grues de chargement')
            ->setUpdateYear(5);
        
        $manager->persist($norme);

        $manager->flush();
    }
}
