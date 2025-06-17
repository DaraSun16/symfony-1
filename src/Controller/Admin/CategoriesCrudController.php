<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CategoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categories::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            ImageField::new('imageName')
                ->setBasePath('/image/categorie')
                ->onlyOnIndex(),
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name'),
            Field::new('imageFile')
                ->setFormType(VichImageType::class)
                ->onlyOnForms()
        ];
    }
}