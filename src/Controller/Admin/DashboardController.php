<?php

namespace App\Controller\Admin;

use App\Entity\Fournisseurs;
use App\Entity\Payment;
use App\Entity\ProduitHome;
use App\Entity\Produits;
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
        yield   MenuItem::linkToCrud('Fournisseurs','fa-brands fa-supple', Fournisseurs::class);
        yield  MenuItem::linkToCrud('Produits','fa-brands fa-product-hunt', Produits::class);
        yield MenuItem::linkToCrud('Payment','fa-sharp fa-solid fa-money-bill-transfer', Payment::class );


    }
    public function configureAssets(): Assets
    {
        return parent::configureAssets()
            ->addWebpackEncoreEntry('admin');
    }

}
