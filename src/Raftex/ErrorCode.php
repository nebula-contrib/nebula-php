<?php
namespace Nebula\Raftex;

/**
 * Autogenerated by Thrift Compiler (0.15.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

final class ErrorCode
{
    const SUCCEEDED = 0;

    const E_LOG_GAP = -1;

    const E_LOG_STALE = -2;

    const E_MISSING_COMMIT = -3;

    const E_WAITING_SNAPSHOT = -4;

    const E_UNKNOWN_PART = -5;

    const E_TERM_OUT_OF_DATE = -6;

    const E_LAST_LOG_TERM_TOO_OLD = -7;

    const E_BAD_STATE = -8;

    const E_WRONG_LEADER = -9;

    const E_WAL_FAIL = -10;

    const E_NOT_READY = -11;

    const E_HOST_STOPPED = -12;

    const E_NOT_A_LEADER = -13;

    const E_HOST_DISCONNECTED = -14;

    const E_TOO_MANY_REQUESTS = -15;

    const E_PERSIST_SNAPSHOT_FAILED = -16;

    const E_BAD_ROLE = -17;

    const E_EXCEPTION = -20;

    static public $__names = array(
        0 => 'SUCCEEDED',
        -1 => 'E_LOG_GAP',
        -2 => 'E_LOG_STALE',
        -3 => 'E_MISSING_COMMIT',
        -4 => 'E_WAITING_SNAPSHOT',
        -5 => 'E_UNKNOWN_PART',
        -6 => 'E_TERM_OUT_OF_DATE',
        -7 => 'E_LAST_LOG_TERM_TOO_OLD',
        -8 => 'E_BAD_STATE',
        -9 => 'E_WRONG_LEADER',
        -10 => 'E_WAL_FAIL',
        -11 => 'E_NOT_READY',
        -12 => 'E_HOST_STOPPED',
        -13 => 'E_NOT_A_LEADER',
        -14 => 'E_HOST_DISCONNECTED',
        -15 => 'E_TOO_MANY_REQUESTS',
        -16 => 'E_PERSIST_SNAPSHOT_FAILED',
        -17 => 'E_BAD_ROLE',
        -20 => 'E_EXCEPTION',
    );
}

