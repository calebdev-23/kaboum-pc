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
use App\Entity\Recette;
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

        //Produits

        yield MenuItem::section('Menu');

        Yield MenuItem::subMenu('Users','fa-solid fa-users')->setSubItems([
            MenuItem::linkToCrud('Info','fa-solid fa-list', User::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', User::class )->setAction('new')

        ]);

        Yield MenuItem::subMenu('Maison','fa-solid fa-home')->setSubItems([
            MenuItem::linkToCrud('Liste','fa-solid fa-list', ProduitHome::class )
                ->setDefaultSort(['date'=>'DESC']),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', ProduitHome::class )->setAction('new')

        ]);
        Yield MenuItem::subMenu('Recette','fa fa-money')->setSubItems([
            MenuItem::linkToCrud('Liste','fa-solid fa-list', Recette::class )
            ->setDefaultSort(['date'=>'DESC']),
            MenuItem::linkToRoute('Recette du jour','fa fa-money','app_recette_today')

        ]);

        Yield MenuItem::subMenu('Produits','fa-brands fa-product-hunt')->setSubItems([
            MenuItem::linkToCrud('Liste','fa-solid fa-list', Produits::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', Produits::class )->setAction('new'),


        ]);
        Yield MenuItem::subMenu('Categories','fa-regular fa-c')->setSubItems([
            MenuItem::linkToCrud('Liste','fa-solid fa-list', Categories::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', Categories::class )->setAction('new')

        ]);




        //fournisseur

        yield MenuItem::section('Compte Fournisseurs');
        Yield MenuItem::subMenu('Information','fa-solid fa-users')->setSubItems([
            MenuItem::linkToCrud('Info','fa-solid fa-list', Fournisseurs::class ),
            MenuItem::linkToCrud('Ajouter','fa-solid fa-plus', Fournisseurs::class )->setAction('new')

        ]);

        yield MenuItem::linkToRoute('Makakely', 'fa fa-user', 'app_makakely');
        yield MenuItem::linkToRoute('Ekinox', 'fa fa-user-secret', 'app_ekinox');
        yield MenuItem::linkToRoute('Ulysse', 'fa fa-user-nurse', 'app_ulysse');
        yield MenuItem::linkToRoute('James', 'fa fa-user-tie', 'app_james');
        yield MenuItem::linkToRoute('Ks', 'fa-solid fa-person', 'app_ks');
        yield MenuItem::linkToRoute('Mampionina', 'fa fa-user-nurse', 'app_mampionina');


    }
    public function configureAssets(): Assets
    {
        return parent::configureAssets()
            ->addWebpackEncoreEntry('admin');
    }

}
