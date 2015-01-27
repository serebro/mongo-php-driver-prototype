/*
  +---------------------------------------------------------------------------+
  | PHP Driver for MongoDB                                                    |
  +---------------------------------------------------------------------------+
  | Copyright 2013-2014 MongoDB, Inc.                                         |
  |                                                                           |
  | Licensed under the Apache License, Version 2.0 (the "License");           |
  | you may not use this file except in compliance with the License.          |
  | You may obtain a copy of the License at                                   |
  |                                                                           |
  | http://www.apache.org/licenses/LICENSE-2.0                                |
  |                                                                           |
  | Unless required by applicable law or agreed to in writing, software       |
  | distributed under the License is distributed on an "AS IS" BASIS,         |
  | WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.  |
  | See the License for the specific language governing permissions and       |
  | limitations under the License.                                            |
  +---------------------------------------------------------------------------+
  | Copyright (c) 2014, MongoDB, Inc.                                         |
  +---------------------------------------------------------------------------+
*/

#ifdef HAVE_CONFIG_H
#	include "config.h"
#endif

/* External libs */
#include <bson.h>
#include <mongoc.h>

/* PHP Core stuff */
#include <php.h>
#include <php_ini.h>
#include <ext/standard/info.h>
#include <Zend/zend_interfaces.h>
#include <ext/spl/spl_iterators.h>
/* Our Compatability header */
#include "php_compat_53.h"

/* Our stuffz */
#include "php_phongo.h"
#include "php_bson.h"


PHONGO_API zend_class_entry *php_phongo_queryresult_ce;

zend_object_handlers php_phongo_handler_queryresult;

/* {{{ proto MongoDB\Driver\QueryResult QueryResult::__construct(MongoDB\Driver\Server $server, MongoDB\Driver\CursorId $cursorId, array $firstBatch)
   Construct a new QueryResult */
PHP_METHOD(QueryResult, __construct)
{
	php_phongo_queryresult_t *intern;
	zend_error_handling       error_handling;
	zval                     *server;
	zval                     *cursorId;
	zval                     *firstBatch;
	(void)return_value_ptr; (void)return_value; (void)return_value_used;


	zend_replace_error_handling(EH_THROW, phongo_exception_from_phongo_domain(PHONGO_ERROR_INVALID_ARGUMENT), &error_handling TSRMLS_CC);
	intern = (php_phongo_queryresult_t *)zend_object_store_get_object(getThis() TSRMLS_CC);

	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "OOa", &server, php_phongo_server_ce, &cursorId, php_phongo_cursorid_ce, &firstBatch) == FAILURE) {
		zend_restore_error_handling(&error_handling TSRMLS_CC);
		return;
	}
	zend_restore_error_handling(&error_handling TSRMLS_CC);

}
/* }}} */
/* {{{ proto void QueryResult::setTypemap(array $typemap)
   Sets a typemap to use for BSON unserialization */
PHP_METHOD(QueryResult, setTypemap)
{
	php_phongo_writeresult_t *intern;
	php_phongo_bson_state     state = PHONGO_BSON_STATE_INITIALIZER;
	zend_error_handling       error_handling;
	zval                     *typemap = NULL;
	(void)return_value_ptr; (void)return_value_used;


	zend_replace_error_handling(EH_THROW, phongo_exception_from_phongo_domain(PHONGO_ERROR_INVALID_ARGUMENT), &error_handling TSRMLS_CC);
	intern = (php_phongo_writeresult_t *)zend_object_store_get_object(getThis() TSRMLS_CC);

	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "a!", &typemap) == FAILURE) {
		zend_restore_error_handling(&error_handling TSRMLS_CC);
		return;
	}
	zend_restore_error_handling(&error_handling TSRMLS_CC);

	php_phongo_bson_typemap_to_state(typemap, &state.map TSRMLS_CC);

	intern->result.visitor_data = state;
}
/* }}} */
/* {{{ proto MongoDB\Driver\Cursor QueryResult::getIterator()
   Returns the Cursor iterator */
PHP_METHOD(QueryResult, getIterator)
{
	php_phongo_queryresult_t *intern;
	zend_error_handling       error_handling;
	(void)return_value_ptr; (void)return_value_used;


	zend_replace_error_handling(EH_THROW, phongo_exception_from_phongo_domain(PHONGO_ERROR_INVALID_ARGUMENT), &error_handling TSRMLS_CC);
	intern = (php_phongo_queryresult_t *)zend_object_store_get_object(getThis() TSRMLS_CC);

	if (zend_parse_parameters_none() == FAILURE) {
		zend_restore_error_handling(&error_handling TSRMLS_CC);
		return;
	}
	zend_restore_error_handling(&error_handling TSRMLS_CC);

	if (intern->result.ce_get_iterator) {
		object_init_ex(return_value, intern->result.ce_get_iterator);
	} else {
		php_phongo_cursor_new_from_result(return_value, &intern->result TSRMLS_CC);
	}

}
/* }}} */
/* {{{ proto self QueryResult::setIteratorClass(string $class)
   Sets the class name of the Cursor implementation to be used */
PHP_METHOD(QueryResult, setIteratorClass)
{
	php_phongo_queryresult_t *intern;
	zend_error_handling       error_handling;
	char                     *class;
	int                       class_len;
	(void)return_value_ptr; (void)return_value_used; (void)return_value;


	zend_replace_error_handling(EH_THROW, phongo_exception_from_phongo_domain(PHONGO_ERROR_INVALID_ARGUMENT), &error_handling TSRMLS_CC);
	intern = (php_phongo_queryresult_t *)zend_object_store_get_object(getThis() TSRMLS_CC);

	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "s", &class, &class_len) == FAILURE) {
		zend_restore_error_handling(&error_handling TSRMLS_CC);
		return;
	}
	zend_restore_error_handling(&error_handling TSRMLS_CC);

}
/* }}} */
/* {{{ proto self QueryResult::setIteratorInitCallback(callable $callback)
   Sets a callback to invoke for initializing a custom Cursor */
PHP_METHOD(QueryResult, setIteratorInitCallback)
{
	php_phongo_queryresult_t *intern;
	zend_error_handling       error_handling;
	zval                     *callback;
	(void)return_value_ptr; (void)return_value_used; (void)return_value;


	zend_replace_error_handling(EH_THROW, phongo_exception_from_phongo_domain(PHONGO_ERROR_INVALID_ARGUMENT), &error_handling TSRMLS_CC);
	intern = (php_phongo_queryresult_t *)zend_object_store_get_object(getThis() TSRMLS_CC);

	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "o", &callback) == FAILURE) {
		zend_restore_error_handling(&error_handling TSRMLS_CC);
		return;
	}
	zend_restore_error_handling(&error_handling TSRMLS_CC);

}
/* }}} */
/* {{{ proto MongoDB\Driver\Server QueryResult::getServer()
   Returns the Server object that this cursor is attached to */
PHP_METHOD(QueryResult, getServer)
{
	php_phongo_queryresult_t *intern;
	zend_error_handling       error_handling;
	mongoc_host_list_t       host;
	(void)return_value_ptr; (void)return_value_used; (void)return_value;


	zend_replace_error_handling(EH_THROW, phongo_exception_from_phongo_domain(PHONGO_ERROR_INVALID_ARGUMENT), &error_handling TSRMLS_CC);
	intern = (php_phongo_queryresult_t *)zend_object_store_get_object(getThis() TSRMLS_CC);

	if (zend_parse_parameters_none() == FAILURE) {
		zend_restore_error_handling(&error_handling TSRMLS_CC);
		return;
	}
	zend_restore_error_handling(&error_handling TSRMLS_CC);


	mongoc_cursor_get_host(intern->result.cursor, &host);
	phongo_server_init(return_value, intern->result.hint, &host TSRMLS_CC);
}
/* }}} */

/**
 * Result returned by Server and Manager executeQuery() methods.
 *
 * This object wraps an OP_REPLY. It is constructed after a query is executed
 * on the server but before a Cursor is created in the driver. This allows the
 * Cursor implementation to be customized.
 */
/* {{{ MongoDB\Driver\QueryResult */

ZEND_BEGIN_ARG_INFO_EX(ai_QueryResult_setTypemap, 0, 0, 1)
	ZEND_ARG_ARRAY_INFO(0, typemap, 0)
ZEND_END_ARG_INFO();

ZEND_BEGIN_ARG_INFO_EX(ai_QueryResult___construct, 0, 0, 3)
	ZEND_ARG_OBJ_INFO(0, server, MongoDB\\Driver\\Server, 0)
	ZEND_ARG_OBJ_INFO(0, cursorId, MongoDB\\Driver\\CursorId, 0)
	ZEND_ARG_ARRAY_INFO(0, firstBatch, 0)
ZEND_END_ARG_INFO();

ZEND_BEGIN_ARG_INFO_EX(ai_QueryResult_getIterator, 0, 0, 0)
ZEND_END_ARG_INFO();

ZEND_BEGIN_ARG_INFO_EX(ai_QueryResult_setIteratorClass, 0, 0, 1)
	ZEND_ARG_INFO(0, class)
ZEND_END_ARG_INFO();

ZEND_BEGIN_ARG_INFO_EX(ai_QueryResult_setIteratorInitCallback, 0, 0, 1)
	ZEND_ARG_INFO(0, callback) /* callable */
ZEND_END_ARG_INFO();

ZEND_BEGIN_ARG_INFO_EX(ai_QueryResult_getServer, 0, 0, 0)
ZEND_END_ARG_INFO();


static zend_function_entry php_phongo_queryresult_me[] = {
	PHP_ME(QueryResult, setTypemap, ai_QueryResult_setTypemap, ZEND_ACC_PUBLIC|ZEND_ACC_FINAL)
	PHP_ME(QueryResult, __construct, ai_QueryResult___construct, ZEND_ACC_PUBLIC|ZEND_ACC_FINAL)
	PHP_ME(QueryResult, getIterator, ai_QueryResult_getIterator, ZEND_ACC_PUBLIC|ZEND_ACC_FINAL)
	PHP_ME(QueryResult, setIteratorClass, ai_QueryResult_setIteratorClass, ZEND_ACC_PUBLIC|ZEND_ACC_FINAL)
	PHP_ME(QueryResult, setIteratorInitCallback, ai_QueryResult_setIteratorInitCallback, ZEND_ACC_PUBLIC|ZEND_ACC_FINAL)
	PHP_ME(QueryResult, getServer, ai_QueryResult_getServer, ZEND_ACC_PUBLIC|ZEND_ACC_FINAL)
	PHP_FE_END
};

/* }}} */


/* {{{ php_phongo_queryresult_t object handlers */
static void php_phongo_queryresult_free_object(void *object TSRMLS_DC) /* {{{ */
{
	php_phongo_queryresult_t *intern = (php_phongo_queryresult_t*)object;

	zend_object_std_dtor(&intern->result.std TSRMLS_CC);

	php_phongo_result_free(&intern->result);

	efree(intern);
} /* }}} */

zend_object_value php_phongo_queryresult_create_object(zend_class_entry *class_type TSRMLS_DC) /* {{{ */
{
	zend_object_value         retval;
	php_phongo_queryresult_t *intern = NULL;

	intern = (php_phongo_queryresult_t *)ecalloc(1, sizeof *intern);

	zend_object_std_init(&intern->result.std, class_type TSRMLS_CC);
	object_properties_init(&intern->result.std, class_type);

	retval.handle = zend_objects_store_put(intern, (zend_objects_store_dtor_t) zend_objects_destroy_object, php_phongo_queryresult_free_object, NULL TSRMLS_CC);
	retval.handlers = &php_phongo_handler_queryresult;

	return retval;
} /* }}} */

HashTable *php_phongo_queryresult_get_debug_info(zval *object, int *is_temp TSRMLS_DC) /* {{{ */
{
	php_phongo_queryresult_t    *intern;
	zval                         retval = zval_used_for_init;


	*is_temp = 1;
	intern = (php_phongo_queryresult_t *)zend_object_store_get_object(object TSRMLS_CC);

	php_phongo_result_to_zval(&retval, &intern->result);

	return Z_ARRVAL(retval);

} /* }}} */
/* }}} */

/* {{{ PHP_MINIT_FUNCTION */
PHP_MINIT_FUNCTION(QueryResult)
{
	(void)type; (void)module_number;
	zend_class_entry ce;

	INIT_NS_CLASS_ENTRY(ce, "MongoDB\\Driver", "QueryResult", php_phongo_queryresult_me);
	php_phongo_queryresult_ce = zend_register_internal_class(&ce TSRMLS_CC);
	php_phongo_queryresult_ce->create_object = php_phongo_queryresult_create_object;
	php_phongo_queryresult_ce->ce_flags |= ZEND_ACC_FINAL_CLASS;
	php_phongo_queryresult_ce->get_iterator = phongo_result_get_iterator;

	memcpy(&php_phongo_handler_queryresult, phongo_get_std_object_handlers(), sizeof(zend_object_handlers));
	php_phongo_handler_queryresult.get_debug_info = php_phongo_queryresult_get_debug_info;

	zend_class_implements(php_phongo_queryresult_ce TSRMLS_CC, 1, zend_ce_aggregate);


	return SUCCESS;
}
/* }}} */



/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: noet sw=4 ts=4 fdm=marker
 * vim<600: noet sw=4 ts=4
 */