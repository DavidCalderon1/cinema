<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecomprasAPIRequest;
use App\Http\Requests\API\UpdatecomprasAPIRequest;
use App\Models\compras;
use App\Repositories\comprasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class comprasController
 * @package App\Http\Controllers\API
 */

class comprasAPIController extends AppBaseController
{
    /** @var  comprasRepository */
    private $comprasRepository;

    public function __construct(comprasRepository $comprasRepo)
    {
        $this->comprasRepository = $comprasRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/compras",
     *      summary="Get a listing of the compras.",
     *      tags={"compras"},
     *      description="Get all compras",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/compras")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->comprasRepository->pushCriteria(new RequestCriteria($request));
        $this->comprasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $compras = $this->comprasRepository->all();

        return $this->sendResponse($compras->toArray(), 'compras retrieved successfully');
    }

    /**
     * @param CreatecomprasAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/compras",
     *      summary="Store a newly created compras in storage",
     *      tags={"compras"},
     *      description="Store compras",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="compras that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/compras")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/compras"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatecomprasAPIRequest $request)
    {
        $input = $request->all();

        $compras = $this->comprasRepository->create($input);

        return $this->sendResponse($compras->toArray(), 'compras saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/compras/{id}",
     *      summary="Display the specified compras",
     *      tags={"compras"},
     *      description="Get compras",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of compras",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/compras"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var compras $compras */
        $compras = $this->comprasRepository->find($id);

        if (empty($compras)) {
            return Response::json(ResponseUtil::makeError('compras not found'), 400);
        }

        return $this->sendResponse($compras->toArray(), 'compras retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatecomprasAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/compras/{id}",
     *      summary="Update the specified compras in storage",
     *      tags={"compras"},
     *      description="Update compras",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of compras",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="compras that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/compras")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/compras"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatecomprasAPIRequest $request)
    {
        $input = $request->all();

        /** @var compras $compras */
        $compras = $this->comprasRepository->find($id);

        if (empty($compras)) {
            return Response::json(ResponseUtil::makeError('compras not found'), 400);
        }

        $compras = $this->comprasRepository->update($input, $id);

        return $this->sendResponse($compras->toArray(), 'compras updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/compras/{id}",
     *      summary="Remove the specified compras from storage",
     *      tags={"compras"},
     *      description="Delete compras",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of compras",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var compras $compras */
        $compras = $this->comprasRepository->find($id);

        if (empty($compras)) {
            return Response::json(ResponseUtil::makeError('compras not found'), 400);
        }

        $compras->delete();

        return $this->sendResponse($id, 'compras deleted successfully');
    }
}
