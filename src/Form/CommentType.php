<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content')
            // ->add('createdAt')
            ->add('article', EntityType::class, [
                'class' => Article::class,
'choice_label' => 'title',
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
'choice_label' => 'email',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
