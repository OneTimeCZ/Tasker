<?php

namespace Models\Map;

use Models\Shared;
use Models\SharedQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'shared' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SharedTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Models.Map.SharedTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'shared';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Models\\Shared';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Models.Shared';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'shared.id';

    /**
     * the column name for the what_id field
     */
    const COL_WHAT_ID = 'shared.what_id';

    /**
     * the column name for the what_type field
     */
    const COL_WHAT_TYPE = 'shared.what_type';

    /**
     * the column name for the to_id field
     */
    const COL_TO_ID = 'shared.to_id';

    /**
     * the column name for the to_type field
     */
    const COL_TO_TYPE = 'shared.to_type';

    /**
     * the column name for the rights field
     */
    const COL_RIGHTS = 'shared.rights';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'shared.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'shared.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'WhatId', 'WhatType', 'ToId', 'ToType', 'Rights', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'whatId', 'whatType', 'toId', 'toType', 'rights', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(SharedTableMap::COL_ID, SharedTableMap::COL_WHAT_ID, SharedTableMap::COL_WHAT_TYPE, SharedTableMap::COL_TO_ID, SharedTableMap::COL_TO_TYPE, SharedTableMap::COL_RIGHTS, SharedTableMap::COL_CREATED_AT, SharedTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'what_id', 'what_type', 'to_id', 'to_type', 'rights', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'WhatId' => 1, 'WhatType' => 2, 'ToId' => 3, 'ToType' => 4, 'Rights' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'whatId' => 1, 'whatType' => 2, 'toId' => 3, 'toType' => 4, 'rights' => 5, 'createdAt' => 6, 'updatedAt' => 7, ),
        self::TYPE_COLNAME       => array(SharedTableMap::COL_ID => 0, SharedTableMap::COL_WHAT_ID => 1, SharedTableMap::COL_WHAT_TYPE => 2, SharedTableMap::COL_TO_ID => 3, SharedTableMap::COL_TO_TYPE => 4, SharedTableMap::COL_RIGHTS => 5, SharedTableMap::COL_CREATED_AT => 6, SharedTableMap::COL_UPDATED_AT => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'what_id' => 1, 'what_type' => 2, 'to_id' => 3, 'to_type' => 4, 'rights' => 5, 'created_at' => 6, 'updated_at' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('shared');
        $this->setPhpName('Shared');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Models\\Shared');
        $this->setPackage('Models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('what_id', 'WhatId', 'INTEGER', 'note', 'id', false, null, null);
        $this->addForeignKey('what_id', 'WhatId', 'INTEGER', 'category', 'id', false, null, null);
        $this->addForeignKey('what_type', 'WhatType', 'VARCHAR', 'note', '', false, 55, null);
        $this->addForeignKey('what_type', 'WhatType', 'VARCHAR', 'category', '', false, 55, null);
        $this->addForeignKey('to_id', 'ToId', 'INTEGER', 'user', 'id', false, null, null);
        $this->addForeignKey('to_id', 'ToId', 'INTEGER', 'group', 'id', false, null, null);
        $this->addForeignKey('to_type', 'ToType', 'VARCHAR', 'user', '', false, 55, null);
        $this->addForeignKey('to_type', 'ToType', 'VARCHAR', 'group', '', false, 55, null);
        $this->addColumn('rights', 'Rights', 'INTEGER', true, null, 0);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Note', '\\Models\\Note', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':what_type',
    1 => 'note',
  ),
  1 =>
  array (
    0 => ':what_id',
    1 => ':id',
  ),
), null, null, null, true);
        $this->addRelation('Category', '\\Models\\Category', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':what_type',
    1 => 'category',
  ),
  1 =>
  array (
    0 => ':what_id',
    1 => ':id',
  ),
), null, null, null, true);
        $this->addRelation('User', '\\Models\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':to_type',
    1 => 'user',
  ),
  1 =>
  array (
    0 => ':to_id',
    1 => ':id',
  ),
), null, null, null, true);
        $this->addRelation('Group', '\\Models\\Group', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':to_type',
    1 => 'group',
  ),
  1 =>
  array (
    0 => ':to_id',
    1 => ':id',
  ),
), null, null, null, true);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? SharedTableMap::CLASS_DEFAULT : SharedTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Shared object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SharedTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SharedTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SharedTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SharedTableMap::OM_CLASS;
            /** @var Shared $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SharedTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = SharedTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SharedTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Shared $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SharedTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SharedTableMap::COL_ID);
            $criteria->addSelectColumn(SharedTableMap::COL_WHAT_ID);
            $criteria->addSelectColumn(SharedTableMap::COL_WHAT_TYPE);
            $criteria->addSelectColumn(SharedTableMap::COL_TO_ID);
            $criteria->addSelectColumn(SharedTableMap::COL_TO_TYPE);
            $criteria->addSelectColumn(SharedTableMap::COL_RIGHTS);
            $criteria->addSelectColumn(SharedTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SharedTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.what_id');
            $criteria->addSelectColumn($alias . '.what_type');
            $criteria->addSelectColumn($alias . '.to_id');
            $criteria->addSelectColumn($alias . '.to_type');
            $criteria->addSelectColumn($alias . '.rights');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(SharedTableMap::DATABASE_NAME)->getTable(SharedTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SharedTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SharedTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SharedTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Shared or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Shared object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SharedTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Models\Shared) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SharedTableMap::DATABASE_NAME);
            $criteria->add(SharedTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SharedQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SharedTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SharedTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the shared table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SharedQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Shared or Criteria object.
     *
     * @param mixed               $criteria Criteria or Shared object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SharedTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Shared object
        }

        if ($criteria->containsKey(SharedTableMap::COL_ID) && $criteria->keyContainsValue(SharedTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SharedTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SharedQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SharedTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SharedTableMap::buildTableMap();
