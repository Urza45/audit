<?php

namespace App\Controller\Admin;

use App\Entity\CacesDate;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CacesDateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CacesDate::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        /*
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
        */
        yield AssociationField::new('categories')
            ->setLabel('Catégorie');
        yield AssociationField::new('workers')
            ->setLabel('Employé');
        yield DateField::new('ObtentionDate')
            ->setLabel('Date obtention');
    }
    
}
