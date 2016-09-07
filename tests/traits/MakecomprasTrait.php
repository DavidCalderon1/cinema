<?php

use Faker\Factory as Faker;
use App\Models\compras;
use App\Repositories\comprasRepository;

trait MakecomprasTrait
{
    /**
     * Create fake instance of compras and save it in database
     *
     * @param array $comprasFields
     * @return compras
     */
    public function makecompras($comprasFields = [])
    {
        /** @var comprasRepository $comprasRepo */
        $comprasRepo = App::make(comprasRepository::class);
        $theme = $this->fakecomprasData($comprasFields);
        return $comprasRepo->create($theme);
    }

    /**
     * Get fake instance of compras
     *
     * @param array $comprasFields
     * @return compras
     */
    public function fakecompras($comprasFields = [])
    {
        return new compras($this->fakecomprasData($comprasFields));
    }

    /**
     * Get fake data of compras
     *
     * @param array $postFields
     * @return array
     */
    public function fakecomprasData($comprasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'precio' => $fake->text,
            'cantidad' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $comprasFields);
    }
}
