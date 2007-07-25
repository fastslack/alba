<?php

require_once 'lib/model/om/BaseRelDivisionActividadDocente.php';


/**
 * Skeleton subclass for representing a row from the 'rel_division_actividad_docente' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class RelDivisionActividadDocente extends BaseRelDivisionActividadDocente {


    public function delete($con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(RelDivisionActividadDocentePeer::DATABASE_NAME);
        }

        try {
            $con->begin();

            $evento = EventoPeer::retrieveByPk($this->getFkEventoId());
            $evento->delete();

            RelDivisionActividadDocentePeer::doDelete($this, $con);
            $this->setDeleted(true);

            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
    }


} // RelDivisionActividadDocente
