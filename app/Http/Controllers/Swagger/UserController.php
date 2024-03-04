<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;


/**
 * @OA\Get(
 *     path="/api/users",
 *     summary="Все пользователи",
 *     tags={"User"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                  @OA\Property(property="name", type="string", example="Misha"),
 *                  @OA\Property(property="surname", type="string", example="Surname"),
 *                  @OA\Property(property="email", type="string", example="email@mail.ru"),
 *                  @OA\Property(property="age", type="integer", example=18),
 *                  @OA\Property(property="address", type="string", example="city Taganrog"),
 *                  @OA\Property(property="balance", type="integer", example=525),
 *                  @OA\Property(property="gender", type="integer", example=1),
 *                  @OA\Property(property="isAdmin", type="boolean", example=true),
 *                  @OA\Property(property="basket", type="object",
 *                      @OA\Property(property="products", type="array", @OA\Items(
 *                           @OA\Property(property="id", type="integer", example=1),
 *                           @OA\Property(property="flower", type="object",
 *                              @OA\Property(property="id", type="integer", example=1),
 *                              @OA\Property(property="title", type="string", example="Title"),
 *                              @OA\Property(property="description", type="string", example="Description"),
 *                              @OA\Property(property="count", type="integer", example=10),
 *                              @OA\Property(property="price", type="integer", example=199),
 *                              @OA\Property(property="category", type="object",
 *                                  @OA\Property(property="id", type="integer", example=1),
 *                                  @OA\Property(property="title", type="string", example="Title category")
 *                              ),
 *                              @OA\Property(property="tags", type="array",@OA\Items(
 *                                  @OA\Property(property="id", type="integer", example=1),
 *                                  @OA\Property(property="title", type="string", example="Title tags"),
 *                              )),
 *                              @OA\Property(property="images", type="array",@OA\Items(
 *                                  @OA\Property(property="id", type="integer", example=1),
 *                                  @OA\Property(property="title", type="string", example="Title image"),
 *                              )),
 *                          ),
 *                          @OA\Property(property="count", type="integer", example=1),
 *                      )),
 *                      @OA\Property(property="total_price", type="integer", example=553),
 *                  )
 *             ))
 *         )
 *     )
 * ),
 * @OA\Get(
 *       path="/api/users/{user}",
 *       summary="Пользователь по ID",
 *       tags={"User"},
 *       @OA\Parameter(
 *           description="ID пользователя",
 *           in="path",
 *           name="user",
 *           required=true,
 *           example=1
 *       ),
 *       security={{ "bearerAuth": {} }},
 *       @OA\Response(
 *           response=200,
 *           description="Ok",
 *           @OA\JsonContent(
 *               @OA\Property(property="data", type="object",
 *                   @OA\Property(property="name", type="string", example="Misha"),
 *                   @OA\Property(property="surname", type="string", example="Surname"),
 *                   @OA\Property(property="email", type="string", example="email@mail.ru"),
 *                   @OA\Property(property="age", type="integer", example=18),
 *                   @OA\Property(property="address", type="string", example="city Taganrog"),
 *                   @OA\Property(property="balance", type="integer", example=525),
 *                   @OA\Property(property="gender", type="integer", example=1),
 *                   @OA\Property(property="isAdmin", type="boolean", example=true),
 *                   @OA\Property(property="basket", type="object",
 *                       @OA\Property(property="products", type="array", @OA\Items(
 *                            @OA\Property(property="id", type="integer", example=1),
 *                            @OA\Property(property="flower", type="object",
 *                               @OA\Property(property="id", type="integer", example=1),
 *                               @OA\Property(property="title", type="string", example="Title"),
 *                               @OA\Property(property="description", type="string", example="Description"),
 *                               @OA\Property(property="count", type="integer", example=10),
 *                               @OA\Property(property="price", type="integer", example=199),
 *                               @OA\Property(property="category", type="object",
 *                                   @OA\Property(property="id", type="integer", example=1),
 *                                   @OA\Property(property="title", type="string", example="Title category")
 *                               ),
 *                               @OA\Property(property="tags", type="array",@OA\Items(
 *                                   @OA\Property(property="id", type="integer", example=1),
 *                                   @OA\Property(property="title", type="string", example="Title tags"),
 *                               )),
 *                               @OA\Property(property="images", type="array",@OA\Items(
 *                                   @OA\Property(property="id", type="integer", example=1),
 *                                   @OA\Property(property="title", type="string", example="Title image"),
 *                               )),
 *                           ),
 *                           @OA\Property(property="count", type="integer", example=1),
 *                       )),
 *                       @OA\Property(property="total_price", type="integer", example=553),
 *                   )
 *               ))
 *           )
 *       )
 *   ),
 *
 *   @OA\Post(
 *       path="/api/users/",
 *       summary="Создать",
 *       tags={"User"},
 *       @OA\RequestBody(
 *           @OA\JsonContent(
 *               allOf={
 *                   @OA\Schema(
 *                       @OA\Property(property="name", type="string", example="Name"),
 *                       @OA\Property(property="surname", type="string", example="Surname"),
 *                       @OA\Property(property="email", type="string", example="email@mail.ru"),
 *                       @OA\Property(property="password", type="string", example="qwerty"),
 *                       @OA\Property(property="age", type="integer", example=53),
 *                       @OA\Property(property="address", type="string", example="address"),
 *                       @OA\Property(property="gender", type="integer", example=1),
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
 */
class UserController extends Controller
{

}
