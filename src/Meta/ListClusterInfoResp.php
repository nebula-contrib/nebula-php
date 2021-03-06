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

class ListClusterInfoResp
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
            'var' => 'meta_servers',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\Nebula\Common\HostAddr',
                ),
        ),
        4 => array(
            'var' => 'storage_servers',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\Nebula\Common\NodeInfo',
                ),
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
     * @var \Nebula\Common\HostAddr[]
     */
    public $meta_servers = null;
    /**
     * @var \Nebula\Common\NodeInfo[]
     */
    public $storage_servers = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['code'])) {
                $this->code = $vals['code'];
            }
            if (isset($vals['leader'])) {
                $this->leader = $vals['leader'];
            }
            if (isset($vals['meta_servers'])) {
                $this->meta_servers = $vals['meta_servers'];
            }
            if (isset($vals['storage_servers'])) {
                $this->storage_servers = $vals['storage_servers'];
            }
        }
    }

    public function getName()
    {
        return 'ListClusterInfoResp';
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
                    if ($ftype == TType::LST) {
                        $this->meta_servers = array();
                        $_size574 = 0;
                        $_etype577 = 0;
                        $xfer += $input->readListBegin($_etype577, $_size574);
                        for ($_i578 = 0; $_i578 < $_size574; ++$_i578) {
                            $elem579 = null;
                            $elem579 = new \Nebula\Common\HostAddr();
                            $xfer += $elem579->read($input);
                            $this->meta_servers []= $elem579;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::LST) {
                        $this->storage_servers = array();
                        $_size580 = 0;
                        $_etype583 = 0;
                        $xfer += $input->readListBegin($_etype583, $_size580);
                        for ($_i584 = 0; $_i584 < $_size580; ++$_i584) {
                            $elem585 = null;
                            $elem585 = new \Nebula\Common\NodeInfo();
                            $xfer += $elem585->read($input);
                            $this->storage_servers []= $elem585;
                        }
                        $xfer += $input->readListEnd();
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
        $xfer += $output->writeStructBegin('ListClusterInfoResp');
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
        if ($this->meta_servers !== null) {
            if (!is_array($this->meta_servers)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('meta_servers', TType::LST, 3);
            $output->writeListBegin(TType::STRUCT, count($this->meta_servers));
            foreach ($this->meta_servers as $iter586) {
                $xfer += $iter586->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->storage_servers !== null) {
            if (!is_array($this->storage_servers)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('storage_servers', TType::LST, 4);
            $output->writeListBegin(TType::STRUCT, count($this->storage_servers));
            foreach ($this->storage_servers as $iter587) {
                $xfer += $iter587->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
