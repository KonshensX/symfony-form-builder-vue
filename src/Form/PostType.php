<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('category', EntityType::class, [
                'class' => 'App\Entity\Category',
                'placeholder' => 'Select a category',
                'mapped' => false
            ])
        ;

        $builder->get('category')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event)
            {
                // XXX: add the field dynamically to the form
                $form = $event->getForm();
                $form->getParent()->add('sub_category', EntityType::class, [
                    'class' => 'App\Entity\SubCategory',
                    'placeholder' => 'Select a sub category',
                    'choices' => $form->getData()->getSubCategories()
                ]);
            }
        );

        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event)
            {
                // add the field and change the fields to the correct values
                $form = $event->getForm();
                $data = $event->getData();

                dump($data);
                $subCategory = $data->getSubCategory();
                if ($subCategory)
                {
                    // set the category to the correct value
                    $form->get('category')->setData($subCategory->getCategory());

                    $form->add('sub_category', EntityType::class, [
                        'class' => 'App\Entity\SubCategory',
                        'placeholder' => 'Select a sub category',
                        'choices' => $subCategory->getCategory()->getSubCategories()
                    ]);    
                }
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
