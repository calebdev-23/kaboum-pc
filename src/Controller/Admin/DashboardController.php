<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Entity\Client;
use App\Entity\Commandes;
use App\Entity\DetailCommande;
use App\Entity\Ekinox;
use App\Entity\Fournisseurs;
use App\Entity\MakaKely;
use App\Entity\Mampionina;
use App\Entity\Payment;
use App\Entity\PcUpgrade;
use App\Entity\ProduitHome;
use App\Entity\Produits;
use App\Entity\Test;
use App\Entity\Ulysse;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Stopwatch\Section;

class DashboardController extends AbstractDashboardController
{
    private $adminUrlGenerator;
    public function __construct( AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
       /* $url =  $this->adminUrlGenerator
            ->setController(CategoriesCrudController::class)
            ->generateUrl();
        return $this->redirect($url); */
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="/logo.jpg" alt="logo" class="img-fluid rounded-circle w-75"/>')
            ->setFaviconPath('logo.jpg');

    }
    public function configureUserMenu(UserInterface $user): UserMenu
    {

       if (!$user instanceof User) {
           throw new \Exception('Wrong user');
       }
        $image =  $user->getIllustration();
        $chemain = '/Photo_profi/'.$image;

        return parent::configureUserMenu($user)
            ->setAvatarUrl($chemain)
            ->setMenuItems([
                MenuItem::linkToUrl('Homepage','fa-solid fa-house-chimney', $this->generateUrl('app_product')),
                MenuItem::linkToUrl('Déconnecter','fa-solid fa-right-from-bracket', $this->generateUrl('app_logout')),

            ]);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa-solid fa-gauge');
        yield MenuItem::linkToCrud('Maison','fa fa-house-user',ProduitHome::class);
        yield MenuItem::linkToCrud('Utilisateur','fa-solid fa-users',User::class);

        //Produits

        yield MenuItem::section('Menu');
        Yield MenuItem::subMenu('Produits','fa-brands fa-product-hunt')->setSubItems([
            MenuItem::linkToCrud('Liste','fa-solid fa-list', Produits::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', Produits::class )->setAction('new')

        ]);
        Yield MenuItem::subMenu('Categories','fa-regular fa-c')->setSubItems([
            MenuItem::linkToCrud('Liste','fa-solid fa-list', Categories::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', Categories::class )->setAction('new')

        ]);


        //fournisseur

        yield MenuItem::section('Fournisseurs');
        Yield MenuItem::subMenu('Information','fa-solid fa-users')->setSubItems([
            MenuItem::linkToCrud('Info','fa-solid fa-list', Fournisseurs::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', Fournisseurs::class )->setAction('new')

        ]);

        Yield MenuItem::subMenu(' Makakely','fa-brands fa-supple')->setSubItems([
            MenuItem::linkToCrud('Liste','fa-solid fa-list', MakaKely::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', MakaKely::class )->setAction('new')

        ]);

        Yield MenuItem::subMenu(' Ekinox','fa-brands fa-supple')->setSubItems([
            MenuItem::linkToCrud('Liste','fa-solid fa-list', Ekinox::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', Ekinox::class )->setAction('new')

        ]);

        Yield MenuItem::subMenu(' Pc-Upgrade','fa-brands fa-supple')->setSubItems([
            MenuItem::linkToCrud('Liste','fa-solid fa-list', PcUpgrade::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', PcUpgrade::class )->setAction('new')

        ]);
        Yield MenuItem::subMenu('Ulysse','fa-brands fa-supple')->setSubItems([
            MenuItem::linkToCrud('Liste','fa-solid fa-list', Ulysse::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', Ulysse::class )->setAction('new')

        ]);

        Yield MenuItem::subMenu('Mampionina','fa-brands fa-supple')->setSubItems([
            MenuItem::linkToCrud('Liste','fa-solid fa-list', Mampionina::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', Mampionina::class )->setAction('new')

        ]);


        /*
        //Client
        Yield MenuItem::subMenu('Client','fa-solid fa-user')->setSubItems([
            MenuItem::linkToCrud('Nos Client','fa-solid fa-list', Client::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', Client::class )->setAction('new')

        ]);

        //Commande

        Yield MenuItem::subMenu('Commande','fa-solid fa-user')->setSubItems([
            MenuItem::linkToCrud('Commande','fa-solid fa-list', Commandes::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', Commandes::class )->setAction('new')
        ]);

        //Detailn du commande
        Yield MenuItem::subMenu('Detail du commande','fa-solid fa-user')->setSubItems([
            MenuItem::linkToCrud('Commande','fa-solid fa-list', DetailCommande::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', DetailCommande::class )->setAction('new')
        ]);

        */



    }
    public function configureAssets(): Assets
    {
        return parent::configureAssets()
            ->addWebpackEncoreEntry('admin');
    }

}
