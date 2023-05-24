<?php

namespace App\DataFixtures;


use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAMS =[
        [
            'title' => 'The Handmaid Tales',
            'synopsis' => 'Welcome to Gilead',
            'reference' => 'category_Drama',
        ],

        [
            'title' => 'Jumanji',
            'synopsis' => 'What is the next les amis?',
            'reference' => 'category_Aventure',
        ],

        [
            'title' => 'Fantastic Beasts',
            'synopsis' => 'La baguette perdu',
            'reference' => 'category_Fantastique',
        ],

        [
            'title' => 'White Chicks',
            'synopsis' => 'Are you up to?',
            'reference' => 'category_Comedie',
        ],

        [
            'title' => 'Modern Family',
            'synopsis' => 'I dont know what to say lol',
            'reference' => 'category_Comedie',
        ]

    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAMS as $key => $programValue) {
            $program = new Program();
            $program->setTitle($programValue['title']);
            $program->setSynopsis($programValue['synopsis']);
            $program->setCategory($this->getReference($programValue['reference']));
            $manager->persist($program);
        }
       
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          CategoryFixtures::class,
        ];
    }


}
