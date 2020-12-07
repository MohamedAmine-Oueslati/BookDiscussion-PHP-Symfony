<?php

namespace App\DataFixtures;

use App\Entity\Books;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BooksFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $book = new Books();
       $book-> setTitle("A Visit From The Goon Squad")
            ->setAuthor("Jennifer Egan")
            ->setImage("https://images-na.ssl-images-amazon.com/images/I/71NuCzurB7L.jpg")
            ->setGenre("Novel, Psychological Fiction")
            ->setDescription("A Visit from the Goon Squad is a book about the interplay of time and music, about survival, about the stirrings and transformations set inexorably in motion by even the most passing conjunction of our fates. Sly, startling, exhilarating work from one of our boldest writers.")
            ->setDatePublished("08-06-2010")
            ->setNumberOfPages(288)
            ->setAvailibility(true);
        $manager->persist($book);

        $book = new Books();
       $book-> setTitle("Gone Girl")
            ->setAuthor("Gillian Flynn")
            ->setImage("https://images-na.ssl-images-amazon.com/images/I/41aEQgTFPoL._SX304_BO1,204,203,200_.jpg")
            ->setGenre("Thriller")
            ->setDescription("Gone Girl's themes include dishonesty, the devious media, the unhappiness that comes with a troubled economy, and the superficial nature of appearance. The characters lie to each other and the reader about affairs and disappearances. Amy fabricates a fake diary to implicate her husband for her disappearance and murder.")
            ->setDatePublished("24-05-2012")
            ->setNumberOfPages(432)
            ->setAvailibility(true);
        $manager->persist($book);

        $book = new Books();
       $book-> setTitle("Freedom")
            ->setAuthor("Jonathan Franzen")
            ->setImage("https://images-na.ssl-images-amazon.com/images/I/51kt3Ag+yFL._SX300_BO1,204,203,200_.jpg")
            ->setGenre("Novel, Domestic Fiction")
            ->setDescription("The novel follows the lives of the Berglund family, particularly the parents Patty and Walter, as their lives develop and then their happiness falls apart. Important to their story is a college friend of Walter's and successful rock musician, Richard Katz, who has a love affair with Patty.")
            ->setDatePublished("31-08-2010")
            ->setNumberOfPages(576)
            ->setAvailibility(true);
        $manager->persist($book);

        $manager->flush();
    }
}
