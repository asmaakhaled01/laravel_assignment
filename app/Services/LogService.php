<?php

namespace App\Services;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LogService{
    
    public $logger;
    public $logPath;

    public function __construct() {
        $this->logPath = dirname((new \ReflectionClass("App\Services\LogService"))->getFileName())."/../../storage/logs/";
    }
    function addInfo($message, $scope = "general"){
        $logFile = date("Y-m-d")."/"."$scope.log";
        $this->logger = new Logger('cscan');
        $this->logger->pushHandler(new StreamHandler($this->logPath.$logFile));
        return $this->logger->addInfo($message);
    }
    
    function addError($message, $scope = "general"){
        $logFile = date("Y-m-d")."/"."$scope.log";
        $this->logger = new Logger('cscan');
        $this->logger->pushHandler(new StreamHandler($this->logPath.$logFile));
        return $this->logger->addError($message);
    }
    
    function addAlert($message, $scope = "general"){
        $logFile = date("Y-m-d")."/"."$scope.log";
        $this->logger = new Logger('cscan');
        $this->logger->pushHandler(new StreamHandler($this->logPath.$logFile));
        return $this->logger->addAlert($message);
    }

}
