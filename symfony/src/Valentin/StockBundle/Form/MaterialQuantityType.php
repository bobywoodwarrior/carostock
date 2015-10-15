<?php

namespace Valentin\StockBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MaterialQuantityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('material','entity', [
                'class'         => 'Valentin\StockBundle\Entity\Material',
                'choice_label'  => 'nameForDropdown',
                'multiple'      => false,
                'expanded'      => false
            ])
            ->add('quantity','number')
            /*
            ->add('productModel','entity', [
                'class'         => 'Valentin\StockBundle\Entity\ProductModel',
                'choice_label'  => 'name',
                //'disabled'      => true,
                'multiple'      => false,
                'expanded'      => false
            ])
            */
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Valentin\StockBundle\Entity\MaterialQuantity'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'valentin_stockbundle_material_quantity';
    }
}
