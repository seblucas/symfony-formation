<?php

namespace QD\SuperBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of ImageType
 *
 * @author formation
 */
class ImageType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('url');
    }
    
    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        //parent::setDefaultOptions($resolver);
        $resolver->setDefaults(array('data_class' => 'QD\SuperBundle\Entity\Image'));
    }
    
    public function getName() {
        return 'image';
    }
}
