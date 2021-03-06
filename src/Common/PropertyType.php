<?php
namespace Nebula\Common;

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

final class PropertyType
{
    const UNKNOWN = 0;

    const BOOL = 1;

    const INT64 = 2;

    const VID = 3;

    const FLOAT = 4;

    const DOUBLE = 5;

    const STRING = 6;

    const FIXED_STRING = 7;

    const INT8 = 8;

    const INT16 = 9;

    const INT32 = 10;

    const TIMESTAMP = 21;

    const DATE = 24;

    const DATETIME = 25;

    const TIME = 26;

    const GEOGRAPHY = 31;

    static public $__names = array(
        0 => 'UNKNOWN',
        1 => 'BOOL',
        2 => 'INT64',
        3 => 'VID',
        4 => 'FLOAT',
        5 => 'DOUBLE',
        6 => 'STRING',
        7 => 'FIXED_STRING',
        8 => 'INT8',
        9 => 'INT16',
        10 => 'INT32',
        21 => 'TIMESTAMP',
        24 => 'DATE',
        25 => 'DATETIME',
        26 => 'TIME',
        31 => 'GEOGRAPHY',
    );
}

