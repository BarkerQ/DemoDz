<?php
/**
 * Created by PhpStorm.
 * User: Константин
 * Date: 10.03.2019
 * Time: 23:39
 */
namespace App;

use App\Http\Controllers\IndexController ;
use App\Material as Material;
/**
 * @BeforeMethods({"init"})
 */
class IndexControllerBench
{
    private $contrl;


    public function init()
    {
        $this->contrl = new IndexController();

    }
    public function dropInd()
    {
        Material::statement('DROP INDEX IF EXISTS ind_mater_ix02;');
        yield 'drop'=> array();
    }
    public function createInd()
    {
        Material::statement('CREATE INDEX IF NOT EXISTS IND_MATER_IX02 ON "MATERIALS"("CREATED_AT" DESC,"DELETED_AT");');

        yield 'create'=> array();
    }
    /**
     * @Iterations(5)
     * @ParamProviders({"dropInd"})
     */
    public function benchWithoutInd($params)
    {

        $m = $this->contrl->getMaterials();
    }
    /**
     * @Iterations(5)
     * @ParamProviders({"createInd"})
     */
    public function benchWithInd($params)
    {

        $m = $this->contrl->getMaterials();
    }
}