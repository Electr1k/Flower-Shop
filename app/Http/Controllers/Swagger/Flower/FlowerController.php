<?php

namespace App\Http\Controllers\Swagger\Flower;

use App\Http\Controllers\Api\Flower\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Filters\FlowerFilter;
use App\Http\Requests\Flower\FilterRequest;
use App\Http\Resources\Flower\FlowerResource;
use App\Models\Flower;


/**
 * @OA\Get(
 *     path="/api/flowers/all",
 *     summary="Список",
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
 * @OA\Post(
 *      path="/api/flowers/",
 *      summary="Создать",
 *      tags={"Flower"},
 *      security={{ "bearerAuth": {} }},
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="title", type="string", example="Title"),
 *                      @OA\Property(property="description", type="string", example="Description"),
 *                      @OA\Property(property="count", type="integer", example=10),
 *                      @OA\Property(property="price", type="integer", example=199),
 *                      @OA\Property(property="category_id", type="integer", example=199),
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
 *       @OA\RequestBody(
 *           @OA\JsonContent(
 *               allOf={
 *                   @OA\Schema(
 *                       @OA\Property(property="id", type="integer", example=1),
 *                       @OA\Property(property="title", type="string", example="Title"),
 *                       @OA\Property(property="description", type="string", example="Description"),
 *                       @OA\Property(property="count", type="integer", example=10),
 *                       @OA\Property(property="price", type="integer", example=199),
 *                       @OA\Property(property="category_id", type="integer", example=199),
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
 *       )
 *   )
 */
class FlowerController extends Controller
{

}
