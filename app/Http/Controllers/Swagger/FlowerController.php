<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;


/**
 * @OA\Get(
 *     path="/api/flowers/all",
 *     summary="Все цветы",
 *     tags={"Flower"},
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="title", type="string", example="Title"),
 *                  @OA\Property(property="description", type="string", example="Description"),
 *                  @OA\Property(property="count", type="integer", example=10),
 *                  @OA\Property(property="price", type="integer", example=199),
 *                  @OA\Property(property="category", type="object",
 *                      @OA\Property(property="id", type="integer", example=1),
 *                      @OA\Property(property="title", type="string", example="Title category")
 *                  ),
 *                  @OA\Property(property="tags", type="array", @OA\Items(
 *                      @OA\Property(property="id", type="integer", example=1),
 *                      @OA\Property(property="title", type="string", example="Title tags"),
 *                  )),
 *                  @OA\Property(property="images", type="array", @OA\Items(
 *                      @OA\Property(property="id", type="integer", example=1),
 *                      @OA\Property(property="title", type="string", example="Title image"),
 *                  ))
 *             ))
 *         )
 *     )
 * ),
 *
 * @OA\Get(
 *      path="/api/flowers/{flower}",
 *      summary="Цветок по ID",
 *      tags={"Flower"},
 *      @OA\Parameter(
 *          description="ID цветка",
 *          in="path",
 *          name="flower",
 *          required=true,
 *          example=1
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                   @OA\Property(property="id", type="integer", example=1),
 *                   @OA\Property(property="title", type="string", example="Title"),
 *                   @OA\Property(property="description", type="string", example="Description"),
 *                   @OA\Property(property="count", type="integer", example=10),
 *                   @OA\Property(property="price", type="integer", example=199),
 *                   @OA\Property(property="category", type="object",
 *                       @OA\Property(property="id", type="integer", example=1),
 *                       @OA\Property(property="title", type="string", example="Title category")
 *                   ),
 *                   @OA\Property(property="tags", type="array", @OA\Items(
 *                       @OA\Property(property="id", type="integer", example=1),
 *                       @OA\Property(property="title", type="string", example="Title tags"),
 *                   )),
 *                   @OA\Property(property="images", type="array", @OA\Items(
 *                       @OA\Property(property="id", type="integer", example=1),
 *                       @OA\Property(property="title", type="string", example="Title image"),
 *                   )
 *              ))
 *          )
 *      )
 *  ),
 *
 * @OA\Post(
 *      path="/api/flowers/",
 *      summary="Создать",
 *      tags={"Flower"},
 *      security={{ "bearerAuth": {} }},
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="title", type="string", example="Title is create"),
 *                      @OA\Property(property="description", type="string", example="Description"),
 *                      @OA\Property(property="count", type="integer", example=10),
 *                      @OA\Property(property="price", type="integer", example=199),
 *                      @OA\Property(property="category_id", type="integer", example=3),
 *                      @OA\Property(property="tags", type="array", @OA\Items(
 *                          type="number",
 *                          description="The tags ID",
 *                          @OA\Schema(type="number")
 *                      )),
 *                      @OA\Property(property="is_published", type="boolean", example=true),
 *                  )
 *              }
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Ok",
 *          @OA\JsonContent()
 *      )
 *  ),
 * @OA\Patch(
 *       path="/api/flowers/{flower}",
 *       summary="Обновить",
 *       tags={"Flower"},
 *       security={{ "bearerAuth": {} }},
 *       @OA\Parameter(
 *          description="ID цветка",
 *          in="path",
 *          name="flower",
 *          required=true,
 *          example=1
 *       ),
 *       @OA\RequestBody(
 *           @OA\JsonContent(
 *               allOf={
 *                   @OA\Schema(
 *                       @OA\Property(property="title", type="string", example="Title is update"),
 *                       @OA\Property(property="description", type="string", example="Description"),
 *                       @OA\Property(property="count", type="integer", example=10),
 *                       @OA\Property(property="price", type="integer", example=10),
 *                       @OA\Property(property="category_id", type="integer", example=8),
 *                       @OA\Property(property="tags", type="array", @OA\Items(
 *                           type="number",
 *                           description="The tags ID",
 *                           @OA\Schema(type="number")
 *                       )),
 *                       @OA\Property(property="is_published", type="boolean", example=true),
 *                   )
 *               }
 *           )
 *       ),
 *       @OA\Response(
 *           response=200,
 *           description="Ok",
 *           @OA\JsonContent()
 *       )
 *   ),
 * @OA\Delete(
 *        path="/api/flowers/{flower}",
 *        summary="Удалить",
 *        tags={"Flower"},
 *        security={{ "bearerAuth": {} }},
 *        @OA\Parameter(
 *           description="ID цветка",
 *           in="path",
 *           name="flower",
 *           required=true,
 *           example=1
 *        ),
 *        @OA\Response(
 *            response=200,
 *            description="Ok",
 *            @OA\JsonContent()
 *        )
 *    )
 */
class FlowerController extends Controller
{

}
