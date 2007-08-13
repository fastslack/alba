<?php


abstract class BaseRelAnioActividad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fk_anio_id = 0;


	
	protected $fk_actividad_id = 0;


	
	protected $fk_orientacion_id;


	
	protected $horas = 0;

	
	protected $aAnio;

	
	protected $aActividad;

	
	protected $aOrientacion;

	
	protected $collRelAnioActividadDocentes;

	
	protected $lastRelAnioActividadDocenteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFkAnioId()
	{

		return $this->fk_anio_id;
	}

	
	public function getFkActividadId()
	{

		return $this->fk_actividad_id;
	}

	
	public function getFkOrientacionId()
	{

		return $this->fk_orientacion_id;
	}

	
	public function getHoras()
	{

		return $this->horas;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RelAnioActividadPeer::ID;
		}

	} 
	
	public function setFkAnioId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_anio_id !== $v || $v === 0) {
			$this->fk_anio_id = $v;
			$this->modifiedColumns[] = RelAnioActividadPeer::FK_ANIO_ID;
		}

		if ($this->aAnio !== null && $this->aAnio->getId() !== $v) {
			$this->aAnio = null;
		}

	} 
	
	public function setFkActividadId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_actividad_id !== $v || $v === 0) {
			$this->fk_actividad_id = $v;
			$this->modifiedColumns[] = RelAnioActividadPeer::FK_ACTIVIDAD_ID;
		}

		if ($this->aActividad !== null && $this->aActividad->getId() !== $v) {
			$this->aActividad = null;
		}

	} 
	
	public function setFkOrientacionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->fk_orientacion_id !== $v) {
			$this->fk_orientacion_id = $v;
			$this->modifiedColumns[] = RelAnioActividadPeer::FK_ORIENTACION_ID;
		}

		if ($this->aOrientacion !== null && $this->aOrientacion->getId() !== $v) {
			$this->aOrientacion = null;
		}

	} 
	
	public function setHoras($v)
	{

		if ($this->horas !== $v || $v === 0) {
			$this->horas = $v;
			$this->modifiedColumns[] = RelAnioActividadPeer::HORAS;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fk_anio_id = $rs->getInt($startcol + 1);

			$this->fk_actividad_id = $rs->getInt($startcol + 2);

			$this->fk_orientacion_id = $rs->getInt($startcol + 3);

			$this->horas = $rs->getFloat($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RelAnioActividad object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RelAnioActividadPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RelAnioActividadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aAnio !== null) {
				if ($this->aAnio->isModified()) {
					$affectedRows += $this->aAnio->save($con);
				}
				$this->setAnio($this->aAnio);
			}

			if ($this->aActividad !== null) {
				if ($this->aActividad->isModified()) {
					$affectedRows += $this->aActividad->save($con);
				}
				$this->setActividad($this->aActividad);
			}

			if ($this->aOrientacion !== null) {
				if ($this->aOrientacion->isModified()) {
					$affectedRows += $this->aOrientacion->save($con);
				}
				$this->setOrientacion($this->aOrientacion);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RelAnioActividadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RelAnioActividadPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRelAnioActividadDocentes !== null) {
				foreach($this->collRelAnioActividadDocentes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aAnio !== null) {
				if (!$this->aAnio->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAnio->getValidationFailures());
				}
			}

			if ($this->aActividad !== null) {
				if (!$this->aActividad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aActividad->getValidationFailures());
				}
			}

			if ($this->aOrientacion !== null) {
				if (!$this->aOrientacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOrientacion->getValidationFailures());
				}
			}


			if (($retval = RelAnioActividadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelAnioActividadDocentes !== null) {
					foreach($this->collRelAnioActividadDocentes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelAnioActividadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFkAnioId();
				break;
			case 2:
				return $this->getFkActividadId();
				break;
			case 3:
				return $this->getFkOrientacionId();
				break;
			case 4:
				return $this->getHoras();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelAnioActividadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkAnioId(),
			$keys[2] => $this->getFkActividadId(),
			$keys[3] => $this->getFkOrientacionId(),
			$keys[4] => $this->getHoras(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RelAnioActividadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkAnioId($value);
				break;
			case 2:
				$this->setFkActividadId($value);
				break;
			case 3:
				$this->setFkOrientacionId($value);
				break;
			case 4:
				$this->setHoras($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RelAnioActividadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkAnioId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkActividadId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkOrientacionId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHoras($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RelAnioActividadPeer::DATABASE_NAME);

		if ($this->isColumnModified(RelAnioActividadPeer::ID)) $criteria->add(RelAnioActividadPeer::ID, $this->id);
		if ($this->isColumnModified(RelAnioActividadPeer::FK_ANIO_ID)) $criteria->add(RelAnioActividadPeer::FK_ANIO_ID, $this->fk_anio_id);
		if ($this->isColumnModified(RelAnioActividadPeer::FK_ACTIVIDAD_ID)) $criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->fk_actividad_id);
		if ($this->isColumnModified(RelAnioActividadPeer::FK_ORIENTACION_ID)) $criteria->add(RelAnioActividadPeer::FK_ORIENTACION_ID, $this->fk_orientacion_id);
		if ($this->isColumnModified(RelAnioActividadPeer::HORAS)) $criteria->add(RelAnioActividadPeer::HORAS, $this->horas);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RelAnioActividadPeer::DATABASE_NAME);

		$criteria->add(RelAnioActividadPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFkAnioId($this->fk_anio_id);

		$copyObj->setFkActividadId($this->fk_actividad_id);

		$copyObj->setFkOrientacionId($this->fk_orientacion_id);

		$copyObj->setHoras($this->horas);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRelAnioActividadDocentes() as $relObj) {
				$copyObj->addRelAnioActividadDocente($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RelAnioActividadPeer();
		}
		return self::$peer;
	}

	
	public function setAnio($v)
	{


		if ($v === null) {
			$this->setFkAnioId('0');
		} else {
			$this->setFkAnioId($v->getId());
		}


		$this->aAnio = $v;
	}


	
	public function getAnio($con = null)
	{
				include_once 'lib/model/om/BaseAnioPeer.php';

		if ($this->aAnio === null && ($this->fk_anio_id !== null)) {

			$this->aAnio = AnioPeer::retrieveByPK($this->fk_anio_id, $con);

			
		}
		return $this->aAnio;
	}

	
	public function setActividad($v)
	{


		if ($v === null) {
			$this->setFkActividadId('0');
		} else {
			$this->setFkActividadId($v->getId());
		}


		$this->aActividad = $v;
	}


	
	public function getActividad($con = null)
	{
				include_once 'lib/model/om/BaseActividadPeer.php';

		if ($this->aActividad === null && ($this->fk_actividad_id !== null)) {

			$this->aActividad = ActividadPeer::retrieveByPK($this->fk_actividad_id, $con);

			
		}
		return $this->aActividad;
	}

	
	public function setOrientacion($v)
	{


		if ($v === null) {
			$this->setFkOrientacionId(NULL);
		} else {
			$this->setFkOrientacionId($v->getId());
		}


		$this->aOrientacion = $v;
	}


	
	public function getOrientacion($con = null)
	{
				include_once 'lib/model/om/BaseOrientacionPeer.php';

		if ($this->aOrientacion === null && ($this->fk_orientacion_id !== null)) {

			$this->aOrientacion = OrientacionPeer::retrieveByPK($this->fk_orientacion_id, $con);

			
		}
		return $this->aOrientacion;
	}

	
	public function initRelAnioActividadDocentes()
	{
		if ($this->collRelAnioActividadDocentes === null) {
			$this->collRelAnioActividadDocentes = array();
		}
	}

	
	public function getRelAnioActividadDocentes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelAnioActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividadDocentes === null) {
			if ($this->isNew()) {
			   $this->collRelAnioActividadDocentes = array();
			} else {

				$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->getId());

				RelAnioActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->getId());

				RelAnioActividadDocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelAnioActividadDocenteCriteria) || !$this->lastRelAnioActividadDocenteCriteria->equals($criteria)) {
					$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelAnioActividadDocenteCriteria = $criteria;
		return $this->collRelAnioActividadDocentes;
	}

	
	public function countRelAnioActividadDocentes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelAnioActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->getId());

		return RelAnioActividadDocentePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelAnioActividadDocente(RelAnioActividadDocente $l)
	{
		$this->collRelAnioActividadDocentes[] = $l;
		$l->setRelAnioActividad($this);
	}


	
	public function getRelAnioActividadDocentesJoinDocente($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelAnioActividadDocentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelAnioActividadDocentes = array();
			} else {

				$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->getId());

				$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelectJoinDocente($criteria, $con);
			}
		} else {
									
			$criteria->add(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $this->getId());

			if (!isset($this->lastRelAnioActividadDocenteCriteria) || !$this->lastRelAnioActividadDocenteCriteria->equals($criteria)) {
				$this->collRelAnioActividadDocentes = RelAnioActividadDocentePeer::doSelectJoinDocente($criteria, $con);
			}
		}
		$this->lastRelAnioActividadDocenteCriteria = $criteria;

		return $this->collRelAnioActividadDocentes;
	}

} 