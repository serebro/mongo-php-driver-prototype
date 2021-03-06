# Bulk CRUD

```php
<?php

$hannes = array(
	"name"    => "Hannes",
	"nick"    => "bjori",
	"citizen" => "Iceland",
);
$hayley = array(
	"name"    => "Hayley",
	"nick"    => "Alien Ninja",
	"citizen" => "USA",
);
$jonpall = array(
	"name"    => "Jon Pall",
	"nick"    => "unknown",
	"citizen" => "Iceland",
);

/* Ordered bulk is executed in the same order as we add the operations to it.
 * If operation fails the execution stops and no further operations executed.
 * For unordered bulk, the operations can be executed in any order by the database
 * in an attempt to optimize its workload. An operation failure will not stop
 * the exection of the rest of the operations.
 * Default: true
 */
$ordered = true;

$bulk = new MongoDB\Driver\BulkWrite($ordered);

?>
```

## CREATE

```php
<?php

/* Argument#1 The document (array/object) to insert.
 * Returns the generated BSON\ObjectID if no _id was provided
 */
$hannes_id  = $bulk->insert($hannes);
$hayley_id  = $bulk->insert($hayley);
$jonpall_id = $bulk->insert($jonpall);

?>
```

## UPDATE

```php
<?php

/* Arguments
 *  #1: array, search criteria
 *  #2: array, the object or operations to apply to the matching document
 *  #3: array, wire protocol options:
 *             limit: integer, 0 or 1,
 *					0: Apply to all matching documents
 *					1: Only apply to the first matching document
 *				upsert: boolean
 *					true: Insert new document matching the criteria
 *					false: Do not insert new document if no matches are found
 */
$bulk->update(
	array("_id" => $hayley_id),
	array('$set' => array("citizen" => "Iceland")),
	array("limit" => 1, "upsert" => false)
);
$bulk->update(
	array("citizen" => "Iceland"),
	array('$set' => array("viking" => true)),
	array("limit" => 0, "upsert" => false)
);
$bulk->update(
	array("name" => "Chuck Norris"),
	array('$set' => array("viking" => false)),
	array("limit" => 1, "upsert" => true)
);

?>
```

## DELETE

```php
<?php

/* Arguments
 *  #1: array, search criteria
 *  #2: array, wire protocol options:
 *             limit: integer, 0 or 1,
 *					0: Delete all matching documents
 *					1: Only delete the first matching document
 */
$bulk->delete(array("_id" => $jonpall_id), array("limit" => 1));

?>
```

## Executing and checking the results

```php
<?php
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$wc      = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY);
$result  = $manager->executeBulkWrite("db.collection", $bulk, $wc);

printf("insertedCount: %d\n", $result->getInsertedCount());
printf("matchedCount: %d\n", $result->getMatchedCount());
printf("modifiedCount: %d\n", $result->getModifiedCount());
printf("upsertedCount: %d\n", $result->getUpsertedCount());
printf("deletedCount: %d\n", $result->getDeletedCount());

foreach ($result->getUpsertedIds() as $index => $id) {
	printf("upsertedId: '%s', index: %d\n", $id, $index);
}

$query  = new MongoDB\Driver\Query(array("viking" => false));
$cursor = $manager->executeQuery("db.collection", $query);
/* Note that var_dump()ing the $cursor will print out all sorts of debug information
 * about the cursor, such as ReadPreferences used, the query executed, namespace,
 * query flags, and the current bulk information */
var_dump(iterator_to_array($cursor));

?>
```


