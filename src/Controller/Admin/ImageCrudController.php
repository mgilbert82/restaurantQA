<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('une photographie')
            ->setPageTitle(Crud::PAGE_INDEX, 'Les images du carousel');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('name'),
            ImageField::new('url')
                ->setLabel('Image')
                ->setBasePath('uploads/carousel-image/')
                ->setUploadDir('public/uploads/carousel-image')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
        ];
    }
}
