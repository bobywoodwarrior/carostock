<?php

namespace Valentin\StockBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text')
            ->add('price','text')
            ->add('number','text')
            ->add('ref','text')
            ->add('season','text')
            ->add('season', 'choice', array(
                'choices' => array(
                    'FW 15/16' => 'FW 15/16',
                    'SS 16' => 'SS 16'
                ),
                'multiple' => false,
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Valentin\StockBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'valentin_stockbundle_product';
    }
}
