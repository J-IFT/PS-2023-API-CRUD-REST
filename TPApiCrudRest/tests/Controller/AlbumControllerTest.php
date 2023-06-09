<?php

namespace App\Test\Controller;

use App\Entity\Album;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AlbumControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/album/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Album::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Album index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'album[titre]' => 'Testing',
            'album[genre]' => 'Testing',
            'album[datesortie]' => 'Testing',
            'album[prix]' => 'Testing',
            'album[idartiste]' => 'Testing',
            'album[idgroupe]' => 'Testing',
        ]);

        self::assertResponseRedirects('/sweet/food/');

        self::assertSame(1, $this->getRepository()->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Album();
        $fixture->setTitre('My Title');
        $fixture->setGenre('My Title');
        $fixture->setDatesortie('My Title');
        $fixture->setPrix('My Title');
        $fixture->setIdartiste('My Title');
        $fixture->setIdgroupe('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Album');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Album();
        $fixture->setTitre('Value');
        $fixture->setGenre('Value');
        $fixture->setDatesortie('Value');
        $fixture->setPrix('Value');
        $fixture->setIdartiste('Value');
        $fixture->setIdgroupe('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'album[titre]' => 'Something New',
            'album[genre]' => 'Something New',
            'album[datesortie]' => 'Something New',
            'album[prix]' => 'Something New',
            'album[idartiste]' => 'Something New',
            'album[idgroupe]' => 'Something New',
        ]);

        self::assertResponseRedirects('/album/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitre());
        self::assertSame('Something New', $fixture[0]->getGenre());
        self::assertSame('Something New', $fixture[0]->getDatesortie());
        self::assertSame('Something New', $fixture[0]->getPrix());
        self::assertSame('Something New', $fixture[0]->getIdartiste());
        self::assertSame('Something New', $fixture[0]->getIdgroupe());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Album();
        $fixture->setTitre('Value');
        $fixture->setGenre('Value');
        $fixture->setDatesortie('Value');
        $fixture->setPrix('Value');
        $fixture->setIdartiste('Value');
        $fixture->setIdgroupe('Value');

        $$this->manager->remove($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/album/');
        self::assertSame(0, $this->repository->count([]));
    }
}
