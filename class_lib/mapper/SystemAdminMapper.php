<?php
/**
 * Phoenix Laboratories NG.
 * Author: N. C. Joseph (phoenixlabs.ng@gmail.com)
 * Project: staff_portal
 * Date: 7/11/15
 * Time: 12:33 PM
 */

namespace class_lib\mapper;

use \class_lib\domain\DomainObject;

class SystemAdminMapper extends EmployeeMapper{
    function __construct() {
        parent::__construct();
    }

    function getCollection( array $raw ) {
        return null;//new StaffCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
	    $obj = parent::doCreateObject($array);

        return $obj;
    }

    protected function doInsert( DomainObject $object ) {
        $values = array_merge(parent::doInsert($object));

        $this->insertStmt()->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }

    function doUpdate( DomainObject $object ) {
        $values = array_merge(parent::doUpdate($object));
        $this->updateStmt->execute( $values );
    }

    function selectStmt() {
        return $this->selectStmt;
    }

    function selectAllStmt() {
        return $this->selectStmt;
    }

    function targetClass()
    {
        return "class_lib\\domain\\SystemAdmin";
    }
}