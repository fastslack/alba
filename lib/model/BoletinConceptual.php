<?php

require_once 'lib/model/om/BaseBoletinConceptual.php';


/**
 * Skeleton subclass for representing a row from the 'boletin_conceptual' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class BoletinConceptual extends BaseBoletinConceptual {

    public function getObservacion() {
        return stream_get_contents(parent::getObservacion());
    }

} // BoletinConceptual
