<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Note;
use App\Entity\Category;
use App\Entity\Notification;
use App\Entity\Like;
use App\Entity\Network;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        // Create categories
        $categories = [];
        for ($i = 0; $i < 5; $i++) {
            $category = new Category();
            $category->setTitle($faker->word);
            $category->setIcon($faker->word);
            $manager->persist($category);
            $categories[] = $category;
        }

        // Create users
        $users = [];
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setUsername($faker->userName);
            $user->setEmail($faker->email);
            $user->setPassword($faker->password);
            $user->setRoles('ROLE_USER');
            $user->setImage($faker->imageUrl());
            $manager->persist($user);
            $users[] = $user;
        }

        // Create notes
        $notes = [];
        for ($i = 0; $i < 20; $i++) {
            $note = new Note();
            $note->setTitle($faker->sentence);
            $note->setSlug($faker->slug);
            $note->setContent($faker->text);  // Utilisez text() au lieu de paragraphs()
            $note->setIsPublic($faker->boolean);
            $note->setViews($faker->numberBetween(0, 1000));
            $note->setCreator($faker->randomElement($users));
            $note->setCategory($faker->randomElement($categories));
            $note->setCreatedAt(new \DateTimeImmutable($faker->date()));
            $note->setUpdatedAt(new \DateTimeImmutable($faker->date()));
            $manager->persist($note);
            $notes[] = $note;
        }

        // Create notifications
        for ($i = 0; $i < 30; $i++) {
            $notification = new Notification();
            $notification->setTitle($faker->sentence);
            $notification->setContent($faker->text);
            $notification->setType($faker->randomElement(['info', 'warning', 'error']));
            $notification->setArchive($faker->boolean);
            $notification->setNote($faker->randomElement($notes));
            $manager->persist($notification);
        }

        // Create likes
        for ($i = 0; $i < 50; $i++) {
            $like = new Like();
            $like->setNote($faker->randomElement($notes));
            $like->setCreator($faker->randomElement($users));
            $manager->persist($like);
        }

        // Create networks
        for ($i = 0; $i < 5; $i++) {
            $network = new Network();
            $network->setName($faker->company);
            $network->setUrl($faker->url);
            $network->setCreator($faker->randomElement($users));
            $manager->persist($network);
        }

        $manager->flush();
    }
}