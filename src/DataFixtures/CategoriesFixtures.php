<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Category;
use App\Entity\SubCategory;


class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

    	// create couple of categories 
    	
    	$category = new Category();
    	$category->setName("Technology");

    	// setting some sub categories
    	$subCategory = new SubCategory();
    	$subCategory->setName("Microsoft");
    	$subCategory->setCategory($category);

    	$subCategory1 = new SubCategory();
    	$subCategory1->setName("Linux");
    	$subCategory1->setCategory($category);

    	$subCategory2 = new SubCategory();
    	$subCategory2->setName("Gaming");
    	$subCategory2->setCategory($category);

	    /////
    	// //
	    /////

    	$category1 = new Category();
    	$category1->setName("Entertainment");

    	// setting some sub categories
    	$subCategory3 = new SubCategory();
    	$subCategory3->setName("Music");
    	$subCategory3->setCategory($category1);

    	$subCategory4 = new SubCategory();
    	$subCategory4->setName("Art");
    	$subCategory4->setCategory($category1);
    	
    	$subCategory5 = new SubCategory();
    	$subCategory5->setName("Movies");
    	$subCategory5->setCategory($category1);


	    /////
    	// //
	    /////


    	$category2 = new Category();
    	$category2->setName("Clothing");

    	// setting some sub categories
    	$subCategory3 = new SubCategory();
    	$subCategory3->setName("Male");
    	$subCategory3->setCategory($category2);

    	$subCategory4 = new SubCategory();
    	$subCategory4->setName("Female");
    	$subCategory4->setCategory($category2);
    	
    	$subCategory5 = new SubCategory();
    	$subCategory5->setName("Babies");
    	$subCategory5->setCategory($category2);

	    /////
    	// //
	    /////
	    ///
    	$category3 = new Category();
    	$category3->setName("Health");

    	// setting some sub categories
    	$subCategory3 = new SubCategory();
    	$subCategory3->setName("Food");
    	$subCategory3->setCategory($category3);

    	$subCategory4 = new SubCategory();
    	$subCategory4->setName("Advices");
    	$subCategory4->setCategory($category3);

    	// persist all sub catogories 
    	$manager->persist($subCategory);
    	$manager->persist($subCategory1);
    	$manager->persist($subCategory2);
    	$manager->persist($subCategory3);
    	$manager->persist($subCategory4);
    	$manager->persist($subCategory5);

    	// persist all categories 
    	$manager->persist($category);
    	$manager->persist($category1);
    	$manager->persist($category2);
    	$manager->persist($category3);

        $manager->flush();
    }
}
