<?php

namespace DiscountBundle\Controller;

use DiscountBundle\Entity\PopularShopGroup;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\OptimisticLockException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="discount")
     *
     * @return Response
     */
    public function indexAction()
    {

        $product = $this->getDoctrine()
            ->getRepository('DiscountBundle:Stikers')
            ->find(13);

        return $this->render('DiscountBundle:default:index.html.twig', [
            'prod' => $product
        ]);

    }

    /**
     * @Route("/shop", name="popular_shop_groups_index")
     *
     * @param Request $request
     * @return Response
     */
    public function popularShopIndexAction(Request $request)
    {
        /**
         * @var EntityManager $em
         */
        $em = $this->getDoctrine()->getManager();
        $popularShopRepository = $em->getRepository(PopularShopGroup::class);


        $popularShopGroups = $popularShopRepository->getGroup(0);


        $errors = $request->get('errors') ?? null;
        return $this->render('DiscountBundle:default:popularShop.html.twig', [
            'popularShopGroups' => $popularShopGroups,
            'errors' => $errors
        ]);
    }

    /**
     * Проверка и добавление в БД категории и популярных магазинов
     * @Route("/shop/add", name="popular_shop_groups_add")
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws OptimisticLockException
     */
    public function addPopularShopAction(Request $request)
    {
        /**
         * @var EntityManager $em
         */
        $em = $this->getDoctrine()->getManager();

        $newCategoryId = (integer)$request->get('newCatId');
        $newShopIds = $request->get('newShopId');
        $groupId = (integer)$request->get('groupId');


        if ($newShopIds && $newCategoryId) {
            //Добавление новой категории
            $popularShopGroup = new PopularShopGroup();
            $popularShopGroup->setCatId($newCategoryId);
            $popularShopGroup->setShopId($newShopIds);
            $popularShopGroup->setSort('-1');
            $popularShopGroup->setGroupId($groupId);

            $em->persist($popularShopGroup);
            $em->flush($popularShopGroup);
        }
        return $this->redirectToRoute('popular_shop_groups_index', ['errors' => 0], 302);
    }

    /**
     * @Route("/shop/edit", name="popular_shop_groups_edit")
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws OptimisticLockException
     */
    public function editPopularShopAction(Request $request)
    {
        /**
         * @var EntityManager $em
         */
        $em = $this->getDoctrine()->getManager();
        $popularShopRepository = $em->getRepository(PopularShopGroup::class);

        $categoryIds = $request->get('catId');
        $shopIds = $request->get('shopId');
        $sort = array_values($request->get('sort'));


        if ($categoryIds && $shopIds) {
            foreach ($sort as $key => $editCatId) {

                $editCat = $popularShopRepository->find($editCatId);
                $editCat->setCatId($categoryIds[$key]);
                $editCat->setShopId($shopIds[$key]);
                $editCat->setSort($key);
                $em->persist($editCat);
                $em->flush($editCat);
            }/*
            var_dump($categoryIds);
            var_dump($shopIds);
            var_dump(array_values($sort));
            die();*/


        }

        return $this->redirectToRoute('popular_shop_groups_index', ['errors' => 0], 302);
    }

    /**
     * @Route("/shop/delete", name="popular_shop_groups_delete")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteAJAXpopularShopAction(Request $request)
    {
        $popularGroupId = $request->get('popularGroupId');
        $em = $this->getDoctrine()->getManager();
        $popularShopRepository = $em->getRepository(PopularShopGroup::class);

        $delCat = $popularShopRepository->find($popularGroupId);
        $em->remove($delCat);
        $em->flush($delCat);

        return new JsonResponse(['success' => [
            'code' => $popularGroupId.'abra kadabra'
        ]]);
    }

    /**
     * @Route ("/vuejs", name="vue_js_index")
     *
     * @return Response
     */
    public function vueJSindexAction()
    {
		$tests[1] = ['id' => '1', 'name' => 'name1'];
		$tests[2] = ['id' => '2', 'name' => 'name2'];
		$tests[3] = ['id' => '3', 'name' => 'name3'];
		$tests[4] = ['id' => '4', 'name' => 'name4'];
		$tests[5] = ['id' => '5', 'name' => 'name5'];
		
		$datas[1][0] = ['value' => 'val1'];
		$datas[1][1] = ['value' => 'val11'];
		$datas[2][0] = ['value' => 'val2'];
		$datas[3][0] = ['value' => 'val3'];
		$datas[4][0] = ['value' => 'val4'];
		$datas[5][0] = ['value' => 'val5'];
		
        return $this->render('DiscountBundle:default:vueJS.html.twig', [
			'tests' => $tests,
			'datas' => $datas
        ]);
    }
}
