<?php

include_once MODEL_FOLDER . 'Flow.php';

class FlowRepository
{

    protected $dbService;
    protected $flowClassName = 'Flow';

    public function __construct()
    {
        $this->dbService = DBService::getInstance();
    }

    /**
     * @return Flow[]
     */
    public function getActiveFlows()
    {

        return $this->dbService->select("select * from flows where status = 1", $this->flowClassName);
    }

    /**
     * @return Flow[]
     * @throws Exception
     */
    public function getInactiveFlows(){


        $flows =  $this->dbService->select("select * from flows where status = 0", $this->userClassName);

        if (count($flows) == 0) {
            throw new Exception("Flows not found");
        }

        return $flows;
    }



}