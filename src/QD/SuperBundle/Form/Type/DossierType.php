<?php

namespace QD\SuperBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of DossierType
 *
 * @author formation
 */
class DossierType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('sousTitre')
            ->add('contenu', 'textarea')
            ->add('dateDebut', 'date')
            ->add('dateFin', 'date')
            ->add('urlImage', 'url')
            ->add('tarif', 'money')
            ->add('save', 'submit');
    }
    
    public function getName() {
        return 'dossier';
    }
}
