<?php
/**
 * Automatically generated by running "php schema.php server".
 *
 * You may modify the file, but re-running schema.php against this file will
 * standardize the format without losing your schema changes. It does lose
 * any changes that are not part of schema. Use "note" field to comment on
 * schema itself, and "note" fields are not used in any code generation but
 * only staying within this file.
 */
///////////////////////////////////////////////////////////////////////////////
// Preamble: C++ code inserted at beginning of ext_{name}.h

DefinePreamble(<<<CPP

CPP
);

///////////////////////////////////////////////////////////////////////////////
// Constants
//
// array (
//   'name' => name of the constant
//   'type' => type of the constant
//   'note' => additional note about this constant's schema
// )


///////////////////////////////////////////////////////////////////////////////
// Functions
//
// array (
//   'name'   => name of the function
//   'desc'   => description of the function's purpose
//   'flags'  => attributes of the function, see base.php for possible values
//   'opt'    => optimization callback function's name for compiler
//   'note'   => additional note about this function's schema
//   'return' =>
//      array (
//        'type'  => return type, use Reference for ref return
//        'desc'  => description of the return value
//      )
//   'args'   => arguments
//      array (
//        'name'  => name of the argument
//        'type'  => type of the argument, use Reference for output parameter
//        'value' => default value of the argument
//        'desc'  => description of the argument
//      )
// )

DefineFunction(
  array(
    'name'   => "dangling_server_proxy_old_request",
    'desc'   => "When I'm running a newer version of the server software and I'm getting an HTTP request that's from old version of a web page, proxy it to a local instance that is still running or dangling just for handling old version of requests. Please read server documentation for more details.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Boolean,
      'desc'   => "TRUE if successful, FALSE otherwise.",
    ),
  ));

DefineFunction(
  array(
    'name'   => "dangling_server_proxy_new_request",
    'desc'   => "When I'm still running an old version of the server software and I'm getting an HTTP request that's newer, proxy it to a specified host that already has the new version of the software running. Please read server documentation for more details.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Boolean,
      'desc'   => "TRUE if successful, FALSE otherwise.",
    ),
    'args'   => array(
      array(
        'name'   => "host",
        'type'   => String,
        'desc'   => "The machine to proxy to.",
      ),
    ),
  ));

DefineConstant(
  array(
    'name'   => "PAGELET_NOT_READY", // no data is available
    'type'   => Int64,
  ));

DefineConstant(
  array(
    'name'   => "PAGELET_READY",     // data available (flushed)
    'type'   => Int64,
  ));

DefineConstant(
  array(
    'name'   => "PAGELET_DONE",      // the pagelet request is finished
    'type'   => Int64,
  ));

DefineFunction(
  array(
    'name'   => "pagelet_server_is_enabled",
    'desc'   => "Whether pagelet server is enabled or not. Please read server documentation for what a pagelet server is.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Boolean,
      'desc'   => "TRUE if it's enabled, FALSE otherwise.",
    ),
  ));

DefineFunction(
  array(
    'name'   => "pagelet_server_task_start",
    'desc'   => "Processes a pagelet server request.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Resource,
      'desc'   => "An object that can be used with pagelet_server_task_status() or pagelet_server_task_result().",
    ),
    'args'   => array(
      array(
        'name'   => "url",
        'type'   => String,
        'desc'   => "The URL we're running this pagelet with.",
      ),
      array(
        'name'   => "headers",
        'type'   => StringMap,
        'value'  => "null_array",
        'desc'   => "HTTP headers to send to the pagelet.",
      ),
      array(
        'name'   => "post_data",
        'type'   => String,
        'value'  => "null_string",
        'desc'   => "POST data to send.",
      ),
      array(
        'name'   => "files",
        'type'   => VariantVec,
        'value'  => "null_array",
        'desc'   => "$_FILES for the pagelet.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "pagelet_server_task_status",
    'desc'   => "Checks finish status of a pagelet task.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Int64,
      'desc'   => "PAGELET_NOT_READY if there is no data available, PAGELET_READY if (partial) data is available from pagelet_server_flush(), and PAGELET_DONE if the pagelet request is done.",
    ),
    'args'   => array(
      array(
        'name'   => "task",
        'type'   => Resource,
        'desc'   => "The pagelet task handle returned from pagelet_server_task_start().",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "pagelet_server_task_result",
    'desc'   => "Block and wait until pagelet task finishes.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => String,
      'desc'   => "HTTP response from the pagelet.",
    ),
    'args'   => array(
      array(
        'name'   => "task",
        'type'   => Resource,
        'desc'   => "The pagelet task handle returned from pagelet_server_task_start().",
      ),
      array(
        'name'   => "headers",
        'type'   => Variant | Reference,
        'desc'   => "HTTP response headers.",
      ),
      array(
        'name'   => "code",
        'type'   => Variant | Reference,
        'desc'   => "HTTP response code.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "pagelet_server_flush",
    'desc'   => "Flush all the currently buffered output, so that the main thread can read it with pagelet_server_task_result(). This is only meaningful in a pagelet thread.",
    'flags'  => HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => null,
      'desc'   => "No value is returned.",
    ),
  ));

DefineFunction(
  array(
    'name'   => "xbox_send_message",
    'desc'   => "Sends an xbox message and waits for response. Please read server documentation for what an xbox is.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Boolean,
      'desc'   => "TRUE if successful, FALSE otherwise.",
    ),
    'args'   => array(
      array(
        'name'   => "msg",
        'type'   => String,
        'desc'   => "The message.",
      ),
      array(
        'name'   => "ret",
        'type'   => Variant | Reference,
        'desc'   => "The response.",
      ),
      array(
        'name'   => "timeout_ms",
        'type'   => Int64,
        'desc'   => "How many milli-seconds to wait.",
      ),
      array(
        'name'   => "host",
        'type'   => String,
        'value'  => "\"localhost\"",
        'desc'   => "Which machine to send to.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "xbox_post_message",
    'desc'   => "Posts an xbox message without waiting. Please read server documentation for more details.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Boolean,
      'desc'   => "TRUE if successful, FALSE otherwise.",
    ),
    'args'   => array(
      array(
        'name'   => "msg",
        'type'   => String,
        'desc'   => "The response.",
      ),
      array(
        'name'   => "host",
        'type'   => String,
        'value'  => "\"localhost\"",
        'desc'   => "Which machine to post to.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "xbox_task_start",
    'desc'   => "Starts a local xbox task.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Resource,
      'desc'   => "A task handle xbox_task_status() and xbox_task_result() can use.",
    ),
    'args'   => array(
      array(
        'name'   => "message",
        'type'   => String,
        'desc'   => "A message to send to xbox's message processing function.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "xbox_task_status",
    'desc'   => "Checks an xbox task's status.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Boolean,
      'desc'   => "TRUE if finished, FALSE otherwise.",
    ),
    'args'   => array(
      array(
        'name'   => "task",
        'type'   => Resource,
        'desc'   => "The xbox task object created by xbox_task_start().",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "xbox_task_result",
    'desc'   => "Block and wait for xbox task's result.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Int64,
      'desc'   => "Response code following HTTP's responses. For example, 200 for success and 500 for server error.",
    ),
    'args'   => array(
      array(
        'name'   => "task",
        'type'   => Resource,
        'desc'   => "The xbox task object created by xbox_task_start().",
      ),
      array(
        'name'   => "timeout_ms",
        'type'   => Int64,
        'desc'   => "How many milli-seconds to wait.",
      ),
      array(
        'name'   => "ret",
        'type'   => Variant | Reference,
        'desc'   => "xbox message processing function's return value.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "xbox_process_call_message",
    'desc'   => "This function is invoked by the xbox facility to start an xbox call task. This function is not intended to be called directly by user code.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Variant,
      'desc'   => "The return value of the xbox call task.",
    ),
    'args'   => array(
      array(
        'name'   => "msg",
        'type'   => String,
        'desc'   => "The call message.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "xbox_get_thread_timeout",
    'desc'   => "Gets the timeout (maximum duration), in seconds, of the current xbox thread. Throws for non-xbox threads.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Int64,
      'desc'   => "The current timeout (maximum duration).",
    ),
  ));

DefineFunction(
  array(
    'name'   => "xbox_set_thread_timeout",
    'desc'   => "Sets the timeout (maximum duration), in seconds, of the current xbox thread. The xbox thread would reset when this amount of time has passed since the previous reset. Throws for non-xbox threads.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => null,
    ),
    'args'   => array(
      array(
        'name'   => "timeout",
        'type'   => Int32,
        'desc'   => "The new timeout (maximum duration).",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "xbox_schedule_thread_reset",
    'desc'   => "Schedules a reset of the current xbox thread, when the next request comes in. Throws for non-xbox threads.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => null,
    ),
  ));

DefineFunction(
  array(
    'name'   => "xbox_get_thread_time",
    'desc'   => "Returns the time that the current xbox thread has been running without a reset, in seconds, and throws for non-xbox threads.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Int64,
      'desc'   => "The time that the current xbox thread has been running without a reset.",
    ),
  ));


///////////////////////////////////////////////////////////////////////////////
// Classes
//
// BeginClass
// array (
//   'name'   => name of the class
//   'desc'   => description of the class's purpose
//   'flags'  => attributes of the class, see base.php for possible values
//   'note'   => additional note about this class's schema
//   'parent' => parent class name, if any
//   'ifaces' => array of interfaces tihs class implements
//   'bases'  => extra internal and special base classes this class requires
//   'footer' => extra C++ inserted at end of class declaration
// )
//
// DefineConstant(..)
// DefineConstant(..)
// ...
// DefineFunction(..)
// DefineFunction(..)
// ...
// DefineProperty
// DefineProperty
//
// array (
//   'name'  => name of the property
//   'type'  => type of the property
//   'flags' => attributes of the property
//   'desc'  => description of the property
//   'note'  => additional note about this property's schema
// )
//
// EndClass()

