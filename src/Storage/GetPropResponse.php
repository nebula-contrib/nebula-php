<?php
namespace Nebula\Storage;

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

class GetPropResponse
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'result',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Nebula\Storage\ResponseCommon',
        ),
        2 => array(
            'var' => 'props',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Nebula\Common\DataSet',
        ),
    );

    /**
     * @var \Nebula\Storage\ResponseCommon
     */
    public $result = null;
    /**
     * @var \Nebula\Common\DataSet
     */
    public $props = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['result'])) {
                $this->result = $vals['result'];
            }
            if (isset($vals['props'])) {
                $this->props = $vals['props'];
            }
        }
    }

    public function getName()
    {
        return 'GetPropResponse';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRUCT) {
                        $this->result = new \Nebula\Storage\ResponseCommon();
                        $xfer += $this->result->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRUCT) {
                        $this->props = new \Nebula\Common\DataSet();
                        $xfer += $this->props->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('GetPropResponse');
        if ($this->result !== null) {
            if (!is_object($this->result)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('result', TType::STRUCT, 1);
            $xfer += $this->result->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->props !== null) {
            if (!is_object($this->props)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('props', TType::STRUCT, 2);
            $xfer += $this->props->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
