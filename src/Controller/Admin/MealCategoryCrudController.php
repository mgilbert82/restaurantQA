<?php

namespace App\Controller\Admin;

use App\Entity\MealCategory;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MealCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MealCategory::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Catégorie de plat');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Nom de la categorie'),
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof MealCategory) return;

        $entityInstance->setName(new \string);

        parent::persistEntity($entityManager, $entityInstance);
    }
}
