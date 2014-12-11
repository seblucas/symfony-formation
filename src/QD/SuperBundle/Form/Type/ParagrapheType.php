<?php

namespace QD\SuperBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of ParagrapheType
 *
 * @author formation
 */
class ParagrapheType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('sousTitre', 'text', array('label' => 'Sous-titre'))
            ->add('contenu', 'textarea')
            ->add('ordre', 'number')
            ->add('image', new ImageType());
            //->add('image', new ImageType());
    }
    
    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        //parent::setDefaultOptions($resolver);
        $resolver->setDefaults(array('data_class' => 'QD\SuperBundle\Entity\Paragraphe'));
    }
    
    public function getName() {
        return 'paragraphe';
    }
}
