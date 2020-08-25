<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 7/13/2020
 * Time: 3:29 PM
 */

namespace AHT\Core;
use AHT\Config\Database;
use AHT\Core\ResourceModelInterface;
use PDO;
//use AHT\Entities\Tasks;


class ResourceModel implements ResourceModelInterface
{
    private $table;
    private $id;
    private $model;

        public function _init($table, $id, $model)
        {
            $this->table = $table;

            $this->id = $id;

            $this->model = $model;

        }
        public function save($model)
        {
            $this->model = $model;
            require ("../bootstrap.php");
            $entityManager->persist($this->model);
            $entityManager->flush();
            return true;

        }
        public function edit($id)
        {
            $this->id = $id;
            require ("../bootstrap.php");
            $result = $entityManager->getRepository(\AHT\Entities\Tasks::class)->find($id);
//            var_dump($result);
//            die();
            return $result;

        }
        public function update($id,$model)
        {
            $this->model = $model;
            require ("../bootstrap.php");
            $this->id = $id;
            $result =  $entityManager->getRepository(\AHT\Entities\Tasks::class)->find($this->id);
            $entityManager->persist($this->model);
            $entityManager->flush();
            return true;
        }
        public function delete($id)
        {

            require ("../bootstrap.php");
            $this->id = $id;
            $result =  $entityManager->find(\AHT\Entities\Tasks::class, $this->id);
            if ($result != null) {
                $entityManager->remove($result);
                $entityManager->flush();
                return true;
            }

        }
        public function getAll(){

            require ("../bootstrap.php");

            $result = $entityManager->getRepository(\AHT\Entities\Tasks::class)->findAll();

            return $result;
        }


}