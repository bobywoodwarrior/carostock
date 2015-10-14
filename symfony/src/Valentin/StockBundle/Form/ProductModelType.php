<?php

namespace Valentin\StockBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductModelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text')
            ->add('reference','text')
            ->add('materialsQuantity','collection', [
                'type'                  => new MaterialQuantityType(),
                'allow_add'             => true,
                'allow_delete'          => true,
                'by_reference'          => false,
                //'cascade_validation'    => true,
                'options'       => array(
                    'required'  => true
                ),
            ])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Valentin\StockBundle\Entity\ProductModel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'valentin_stockbundle_product_model';
    }
}
