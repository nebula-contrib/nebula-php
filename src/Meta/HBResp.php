<?php
namespace Nebula\Meta;

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

class HBResp
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'code',
            'isRequired' => false,
            'type' => TType::I32,
            'class' => '\Nebula\Common\ErrorCode',
        ),
        2 => array(
            'var' => 'leader',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Nebula\Common\HostAddr',
        ),
        3 => array(
            'var' => 'cluster_id',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        4 => array(
            'var' => 'last_update_time_in_ms',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        5 => array(
            'var' => 'meta_version',
            'isRequired' => false,
            'type' => TType::I32,
        ),
    );

    /**
     * @var int
     */
    public $code = null;
    /**
     * @var \Nebula\Common\HostAddr
     */
    public $leader = null;
    /**
     * @var int
     */
    public $cluster_id = null;
    /**
     * @var int
     */
    public $last_update_time_in_ms = null;
    /**
     * @var int
     */
    public $meta_version = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['code'])) {
                $this->code = $vals['code'];
            }
            if (isset($vals['leader'])) {
                $this->leader = $vals['leader'];
            }
            if (isset($vals['cluster_id'])) {
                $this->cluster_id = $vals['cluster_id'];
            }
            if (isset($vals['last_update_time_in_ms'])) {
                $this->last_update_time_in_ms = $vals['last_update_time_in_ms'];
            }
            if (isset($vals['meta_version'])) {
                $this->meta_version = $vals['meta_version'];
            }
        }
    }

    public function getName()
    {
        return 'HBResp';
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
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->code);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRUCT) {
                        $this->leader = new \Nebula\Common\HostAddr();
                        $xfer += $this->leader->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->cluster_id);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->last_update_time_in_ms);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->meta_version);
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
        $xfer += $output->writeStructBegin('HBResp');
        if ($this->code !== null) {
            $xfer += $output->writeFieldBegin('code', TType::I32, 1);
            $xfer += $output->writeI32($this->code);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->leader !== null) {
            if (!is_object($this->leader)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('leader', TType::STRUCT, 2);
            $xfer += $this->leader->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cluster_id !== null) {
            $xfer += $output->writeFieldBegin('cluster_id', TType::I64, 3);
            $xfer += $output->writeI64($this->cluster_id);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->last_update_time_in_ms !== null) {
            $xfer += $output->writeFieldBegin('last_update_time_in_ms', TType::I64, 4);
            $xfer += $output->writeI64($this->last_update_time_in_ms);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->meta_version !== null) {
            $xfer += $output->writeFieldBegin('meta_version', TType::I32, 5);
            $xfer += $output->writeI32($this->meta_version);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
