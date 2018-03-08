<?php

namespace DiscountBundle\Controller;

use DiscountBundle\Entity\PopularShopGroup;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\OptimisticLockException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
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
            $popularShopGroup->setSort('0');
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
        $sort = $request->get('sort');


        if ($categoryIds && $shopIds) {
            foreach ($sort as $key => $editCatId) {

                $editCat = $popularShopRepository->find($editCatId);
                $editCat->setCatId($categoryIds[$key-1]);
                $editCat->setShopId($shopIds[$key-1]);
                $editCat->setSort($key-1);
                $em->persist($editCat);
                $em->flush($editCat);
            }


        }

        return $this->redirectToRoute('popular_shop_groups_index', ['errors' => 0], 302);
    }
}
