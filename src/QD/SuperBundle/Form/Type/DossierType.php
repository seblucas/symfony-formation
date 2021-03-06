<?php

namespace QD\SuperBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of DossierType
 *
 * @author formation
 */
class DossierType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'text', array('disabled' => true))
            ->add('titre')
            ->add('sousTitre', 'text', array('required' => false, 'label' => 'Sous-titre'))
            ->add('contenu', 'textarea')
            ->add('dateDebut', 'date', array('label' => 'Date de début'))
            ->add('dateFin', 'date', array('label' => 'Date de fin'))
            ->add('urlImage', 'url', array('required' => false, 'label' => "Url de l'image"))
            ->add('tarif', 'money')
            ->add('idiot', 'text', array('mapped' => false))
            ->add('paragraphes', 'collection', array('type' => new ParagrapheType(), 
                                                     "allow_add" => true, 
                                                     "allow_delete" => true,
                                                     "by_reference" => false
                ))
            ->add('Sauvegarde', 'submit');
    }
    
    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        //parent::setDefaultOptions($resolver);
        $resolver->setDefaults(array('data_class' => 'QD\SuperBundle\Entity\Dossier',
                                     'validation_groups' => array('Default', 'test')));
    }
    
    public function getName() {
        return 'dossier';
    }
}
