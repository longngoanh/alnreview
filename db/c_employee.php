<?php

class CEmployee {
    const TABLE_NAME = 'employee';
    var $data;

    function GetEmployeeID() {
        return $this->data['EmployeeID'];
    }
    
    function GetIPAddress() {
        return $this->data['IPAddress'];
    }
    
    function GetEmployeeName() {
        return $this->data['EmployeeName'];
    }
    
    function GetEmployeeGroup() {
        return $this->data['EmployeeGroup'];
    }
    
    function GetAvartaID() {
        return $this->data['AvartaID'];
    }
    
    function GetDateOfBirth() {
        return $this->data['dateOfBirth'];
    }
    
    function GetHometown() {
        return $this->data['hometown'];
    }
    
    function GetWorkFromDate() {
        return $this->data['workFromDate'];
    }
    
    function __construct($data) {
        $this->data = $data;
    }
    
    /**
     * 
     * @param PDO $connectDBObj
     * @param int $nEmployeeID
     * @return \self
     */
    static function fetchByEmployeeID($connectDBObj, $nEmployeeID) {
        $cEmployee = null;
        $szSql = "SELECT * FROM " . self::TABLE_NAME . " WHERE EmployeeID = $nEmployeeID";
        $stmt = $connectDBObj->prepare($szSql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultData = $stmt->fetchAll();
        $cEmployee = new self($resultData[0]);

        return $cEmployee;
    }
    
    /**
     * 
     * @param type $szIPAddress
     * @param type $szEmployeeName
     * @param type $nEmployeeGroup
     * @param type $nAvartaID
     * @param type $szDateOfBirth
     * @param type $szHometown
     * @param type $szWorkFromDate
     * @param type $szCond
     * @return type
     */
    static function CreateNew($connectDBObj, $szIPAddress, $szEmployeeName, $nEmployeeGroup, $nAvartaID, $szDateOfBirth = "", $szHometown = "", $szWorkFromDate = "", $szCond = "") {
        $szSql = " insert into " . self::TABLE_NAME . " set"
                . "  IPAddress = '$szIPAddress'"
                . ", EmployeeName = '$szEmployeeName'"
                . ", EmployeeGroup = '$nEmployeeGroup'"
                . ", AvartaID = '$nAvartaID'"
                . ", dateOfBirth = '$szDateOfBirth'"
                . ", hometown = '$szHometown'"
                . ", workFromDate = '$szWorkFromDate'"
                . "" . $szCond;
        
        return $connectDBObj->exec($szSql);
    }
    
    /**
     * 
     * @param type $connectDBObj
     * @param type $aSetKeyValuePairs
     * @param type $szCondition
     * @return type
     */
    static function updateData($connectDBObj, $aSetKeyValuePairs, $szCondition){
        $szSql = "UPDATE ".self::TABLE_NAME." SET ";
        foreach ($aSetKeyValuePairs as $szKey => $szValue){
            $szSql .= "$szKey = '$szValue',";
        }
        // Remove last , sign 
        $szSql = substr_replace($szSql,"",-1);
        $szSql .= " ".$szCondition;
        // Prepare statement
        $stmt = $connectDBObj->prepare($szSql);
        
        // execute the query
        $stmt->execute();
        
        return $stmt->rowCount();
    }
    
}
