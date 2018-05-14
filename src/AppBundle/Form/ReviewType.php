<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text',TextareaType::class, array('attr'=>array('maxlenght'=>250,'label'=>'Description')))
            ->add('publicationDate',DateType::class,array('data'=>new \DateTime()))
            ->add('note',IntegerType::class, array('attr'=>array('min'=>0,'max'=>5,'label'=>'Note  ')))
            ->add('agreeTerms',CheckboxType::class, array('mapped'=>false))
            ->add('userRated',EntityType::class,array(
                'class'=> 'AppBundle\Entity\User',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.lastname','ASC');
                },
                'choice_label'=>'lastName'
            ))
            ->add('reviewAuthor');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Review'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_review';
    }


}
