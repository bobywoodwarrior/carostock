<?php

namespace Valentin\StockBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('reference','text')
            ->add('name','text')
            ->add('priceWhole','text')
            ->add('season', 'choice', array(
                'choices' => array(
                    'FW 15/16' => 'FW 15/16',
                    'SS 16' => 'SS 16'
                ),
                'multiple' => false,
            ))
            ->add('createdAt','date',[
                'label' => 'Made at'
            ])
            ->add('productModel','entity', [
                'class'     => 'Valentin\StockBundle\Entity\ProductModel',
                'property'  => 'name',
                'multiple'  => false,
                'expanded'  => false,
                'read_only' => ($options['isFull']) ? false : true,
                'disabled'  => ($options['isFull']) ? false : true
            ])
            ->add('quantitySizeUniq','integer',[
                'label' => 'Uniq size',
                'read_only' => ($options['isFull']) ? false : true,
                'disabled'  => ($options['isFull']) ? false : true
            ])
            ->add('quantitySizeZero','integer',[
                'label' => 'Size 0',
                'read_only' => ($options['isFull']) ? false : true,
                'disabled'  => ($options['isFull']) ? false : true
            ])
            ->add('quantitySizeOne','integer',[
                'label' => 'Size 1',
                'read_only' => ($options['isFull']) ? false : true,
                'disabled'  => ($options['isFull']) ? false : true
            ])
            ->add('quantitySizeTwo','integer',[
                'label' => 'Size 2',
                'read_only' => ($options['isFull']) ? false : true,
                'disabled'  => ($options['isFull']) ? false : true
            ])
            ->add('quantitySizeThree','integer',[
                'label' => 'Size 3',
                'read_only' => ($options['isFull']) ? false : true,
                'disabled'  => ($options['isFull']) ? false : true
            ])
            ->add('quantitySizeFour','integer',[
                'label' => 'Size 4',
                'read_only' => ($options['isFull']) ? false : true,
                'disabled'  => ($options['isFull']) ? false : true
            ])
            ->add('quantitySizeFive','integer',[
                'label' => 'Size 5',
                'read_only' => ($options['isFull']) ? false : true,
                'disabled'  => ($options['isFull']) ? false : true
            ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Valentin\StockBundle\Entity\Production',
            'isFull'     => true
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'valentin_stockbundle_production';
    }
}
