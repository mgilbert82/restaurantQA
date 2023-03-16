<?php

namespace App\Controller\Admin;

use App\Entity\Dish;
use App\Entity\MealCategory;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DishCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dish::class;
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Recette');
    }

    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('title')->setLabel('Titre'),
            TextareaField::new('description')->setLabel('Description'),
            MoneyField::new('price')
                ->setLabel('Prix')
                ->setCurrency('EUR'),
            AssociationField::new('category')
                ->setLabel('Type de catégorie')
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof MealCategory) return;

        $entityInstance->setName(new \string);

        parent::persistEntity($entityManager, $entityInstance);
    }
}
